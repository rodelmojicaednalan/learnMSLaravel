<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingApplicant;
use App\Models\TrainingSchedule;
use App\Models\Subject;
use App\Models\Training;
use App\Models\ArtbugClass;
use App\Models\ClassSchedule;

use Auth;

class DashboardController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '';

        $get_obj = TrainingApplicant::where('user_id', Auth::user()->id)->get();
        $get_classes = ArtbugClass::where('teacher_id', Auth::user()->id)->where('type','private')->get();

        $data = $get_obj;

        $schedules_arr = [];
        $classes_arr = [];

        $ctr=0;
        $ctr2=0;

        for($z = 0; $z < sizeof($data); $z++)
        {

            $get_schedules = TrainingSchedule::where('training_id', $data[$z]->training_id)->get();


            for($x=0; $x < sizeof($get_schedules); $x++)
            {

            	$training_obj = Training::where('id', $data[$z]->training_id)->first();
                $subject_obj = Subject::where('id', $training_obj->subject_id)->first();

                $schedules_arr[$ctr]['subject_name'] = $subject_obj->subject;
                $schedules_arr[$ctr]['start_date'] = $get_schedules[$x]->start_date;
                $schedules_arr[$ctr]['start_time'] = $get_schedules[$x]->start_time;
                $time_str = date("g:iA", strtotime($get_schedules[$x]->start_time))." - ".date("g:iA", strtotime($get_schedules[$x]->end_time));
                $schedules_arr[$ctr]['title'] = $time_str;
                $schedules_arr[$ctr]['end_time'] = $get_schedules[$x]->end_time;
                $schedules_arr[$ctr]['description'] = "Subject: ". $subject_obj->subject;
                $ctr++;
            }

        }

        for($b = 0; $b < sizeof($get_classes); $b++)
        {

            $get_schedules = ClassSchedule::where('class_id', $get_classes[$b]->id)->get();

            for($c=0; $c < sizeof($get_schedules); $c++)
            {

                $subject_obj = Subject::where('id', $get_classes[$b]->subject_id)->first();

                $classes_arr[$ctr2]['subject_name'] = $subject_obj->subject;
                $classes_arr[$ctr2]['start_date'] = $get_schedules[$c]->start_date;
                $classes_arr[$ctr2]['start_time'] = $get_schedules[$c]->start_time;
                $time_str = date("g:iA", strtotime($get_schedules[$c]->start_time))." - ".date("g:iA", strtotime($get_schedules[$c]->end_time));
                $classes_arr[$ctr2]['title'] = $time_str;
                $classes_arr[$ctr2]['end_time'] = $get_schedules[$c]->end_time;
                $classes_arr[$ctr2]['description'] = "Subject: ". $subject_obj->subject;
                $ctr2++;

            }

        }

        // print_r($schedules_arr);exit;

        return view('backend.teacher.dashboard.index', compact('page_title', 'page_description'))->with('schedules', $schedules_arr)->with('classes_arr' , $classes_arr);
    }

    public function schedule() {
        $training_schedule = TrainingApplicant::where('user_id', Auth::user()->id)->get();
        $class_schedule = ArtbugClass::where('teacher_id', Auth::user()->id)->where('type','private')->get();
        $schedule_arr = [];

        foreach ($training_schedule as $k => $v) {
            $get_schedules = TrainingSchedule::where('training_id', $v['training_id'])->first();
            if($get_schedules) {
                $data['subject_name'] = $get_schedules->training->subject->subject;
                $data['start'] = $get_schedules->start_date . ' ' . $get_schedules->start_time;
                $data['end'] = $get_schedules->start_date . ' ' . $get_schedules->end_time;
                $data['title'] = 'Training - ' . $get_schedules->training->subject->subject;
                $data['description'] = $get_schedules->start_time . ' - '. $get_schedules->end_time;
                $data['className'] = 'fc-event-solid-success fc-event-light';
                array_push($schedule_arr, $data);
            }
        }

        foreach ($class_schedule as $k => $v) {
            $class_sched = ClassSchedule::where('class_id', $v['id'])->first();

            if ($class_sched) {
                $data['subject_name'] = $class_sched->subject->subject->subject;
                $data['start'] = $class_sched->start_date . ' ' . $class_sched->start_time;
                $data['end'] = $class_sched->start_date . ' ' . $class_sched->end_time;
                $data['title'] = $class_sched->subject->class;
                $data['description'] = $class_sched->start_time . ' - '. $class_sched->end_time;
                $data['className'] = 'fc-event-solid-warning fc-event-light';
                array_push($schedule_arr, $data);
            }

        }

        return response()->json($schedule_arr);


    }
}
