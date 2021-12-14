<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\Classes\StoreRequest;
use App\Models\ClassSchedule;
use App\Models\Level;
use App\Models\SchoolClass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zoom;
use Carbon\Carbon;

class ClassController extends Controller
{
    public $zoom_email;

    public function __construct()
    {
        $this->zoom_email = env('ZOOM_EMAIL');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Classes';
        $school = Auth::user()->schoolAdmin;
        $teachers = $school->teacher;
        $subjects = Subject::where('school_id', $school->id)->get();

        return view('backend.school.administrator.classes.index', compact('page_title', 'teachers', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $response = [];
        $school = Auth::user()->schoolAdmin;

        $request->merge([
            'school_id' => $school->id,
            'type' => 'public'
        ]);

        $class = $request->only(
            'school_id',
            'user_id',
            'subject_id',
            'level_id',
            'class',
            'fee',
            'type'
        );

        try {

            DB::beginTransaction();

            /*
             * Create User Details
             */
            $created = SchoolClass::create($class);

            /*
             * Assign User to a Role
             */

            DB::commit();

            $response['success'] = true;

        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolClass $schoolClass)
    {
        $response = [];

        $class = $request->only(
            'user_id',
            'subject_id',
            'level_id',
            'class',
            'fee',
        );

        try {

            DB::beginTransaction();

            /*
             * Update Details
             */
            $schoolClass->update($class);

            DB::commit();

            $response['success'] = true;
            $response['updated'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating class.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        //
    }

    public function ajax($section, Request $request)
    {
        if(!$request->ajax()){
            $response['success'] = false;
            $response['message'] = "Invalid request";
            return response()->json($response, 400);
        }

        switch ($section) {

            case 'load_levels':
                return $this->loadLevels($request);
                break;

            case 'list':
                return $this->classList();
                break;

            case 'load_single_class':
                return $this->getClassDetails($request);
                break;

            case 'load_schedules':
                return $this->getSchedules($request);

            break;

            case 'add_new_schedule':
                return $this->addSchedule($request);

			break;

            case 'update_single_schedule':
                return $this->updateSchedule($request);

			break;

            default:
                # code...
                break;
        }
    }

    private function updateSchedule($request) {

        $school = Auth::user()->schoolAdmin;
        $schedule = ClassSchedule::where('id', $request->update_schedule_id)->first();

        $class = SchoolClass::where('id', $schedule->class_id)->first();
        $subject = Subject::where('id', $class->subject_id)
                                ->where('school_id', $school->id)
                                ->first();

        $get_date = date("Y-m-d", strtotime($request->start_date2));
        $get_time = date("H:i:s", strtotime($request->start_time2));

        $date_str = $get_date." ".$get_time;

        $get_zoom = Zoom::user()->find($this->zoom_email);

        $get_url = "";
        $get_mid = "";

        $to_time = strtotime($request->start_time2);
        $from_time = strtotime($request->end_time2);
        $str_duration =  round(abs($to_time - $from_time) / 60,2);

        if($get_zoom != null)
        {

            $get_meeting = Zoom::meeting()->find($schedule->meeting_id);

            if($get_meeting != null)
            {
                $get_meeting->delete();
            }


            $meeting = Zoom::meeting()->make([
                'topic' => $subject->subject,
                'type' => 8,
                'duration' => $str_duration,
                'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $date_str, 'UTC'),
            ]);

            $meeting->recurrence()->make([
                'type' => 1,
                'repeat_interval' => 1,
                'weekly_days' => "1",
                'end_times' => 1 // ilang beses mauulet
            ]);



            $meeting->settings()->make([
                'join_before_host' => true,
                'approval_type' => 0,
                'registration_type' => 1,
                'enforce_login' => false,
                'waiting_room' => false,
                'registrants_email_notification' => false,
            ]);

            $new_meeting = $get_zoom->meetings()->save($meeting);

            $get_url = $new_meeting->join_url;
            $get_mid = $new_meeting->id;
            }

            $schedule->start_date = $request->start_date2;
            $schedule->start_time = date("H:i", strtotime($request->start_time2));
            $schedule->end_time = date("H:i", strtotime($request->end_time2));
            $schedule->meeting_id = $get_mid;
            $schedule->meeting_url = $get_url;

            $schedule->save();

            return response()->json(array('error'=>false , 'message'=>'Data Successfully Updated'));
    }

    private function getSchedules($request) {
        $get_obj = SchoolClass::where('id', $request->id)->with('schedule')->first();

        $data['class'] = $get_obj;

        return view('backend.school.administrator.classes.ajax.schedule-modal')->with($data);
    }

    private function addSchedule($request) {
        $school = Auth::user()->schoolAdmin;
        $get_class = SchoolClass::where('id', $request->class_id)->first();
        $get_subject = Subject::where('id', $get_class->subject_id)
                        ->where('school_id', $school->id)->first();

        $get_zoom = Zoom::user()->find($this->zoom_email);

        $get_url = "";
        $get_mid = "";

        $get_date = date("Y-m-d", strtotime($request->start_date));
        $get_time = date("H:i:s", strtotime($request->start_time));

        $date_str = $get_date." ".$get_time;

        $to_time = strtotime($request->start_time);
        $from_time = strtotime($request->end_time);
        $str_duration =  round(abs($to_time - $from_time) / 60,2);


        if($get_zoom != null)
        {

            $meeting = Zoom::meeting()->make([
                'topic' => $get_subject->subject,
                'type' => 8,
                'duration' => $str_duration,
                'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $date_str, 'UTC'),
            ]);

            $meeting->recurrence()->make([
                'type' => 1,
                'repeat_interval' => 1,
                'weekly_days' => "1",
                'end_times' => 1 // ilang beses mauulet
            ]);

            $meeting->settings()->make([
                'join_before_host' => true,
                'approval_type' => 0,
                'registration_type' => 1,
                'enforce_login' => false,
                'waiting_room' => false,
                'registrants_email_notification' => false,
            ]);

            $get_meeting = $get_zoom->meetings()->save($meeting);

            $get_url = $get_meeting->join_url;
            $get_mid = $get_meeting->id;

        }

        $training_insert = ClassSchedule::create([
            'class_id' => $request->class_id,
            'start_date' => $request->start_date,
            'start_time' => date("H:i", strtotime($request->start_time)),
            'end_time' => date("H:i", strtotime($request->end_time)),
            'meeting_id' => $get_mid,
            'meeting_url' => $get_url,
        ]);

        return response()->json($training_insert);

    }

    private function getClassDetails($request) {
        $data = SchoolClass::where('id', $request->id)->first();
        return json_encode($data);
    }

    private function loadLevels($request){
        $data = Level::where('subject_id', $request->id)->get();
        return json_encode($data);
    }

    private function classList() {
        $school = Auth::user()->schoolAdmin;
        $class = SchoolClass::with('user', 'subject', 'level', 'schedule')
                    ->where('school_id', $school->id)->get();
        return response()->json($class);
    }
}
