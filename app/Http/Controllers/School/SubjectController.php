<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Subject';
        return view('backend.school.administrator.subject.index', compact('page_title'));
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
    public function store(Request $request)
    {
        $currUser = Auth::user();
        $school = $currUser->schoolAdmin;

        $fake_id = $request->fake_id;

        $subject_obj = Subject::where('id', $fake_id)->first();

        $validator = \Validator::make($request->all(), [
            'subject' => 'required',
            'fee' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(
                array(
                    'error'=>true ,
                    'errors'=>$validator->errors()->all()
                )
            );
        }

        if(empty($subject_obj))
        {

            $insert_id = Subject::create([
                'subject' => $request->subject,
                'fee' => $request->fee,
                'school_id' => $school->id,
                'type' => $request->type,
            ]);

            return response()->json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
        }
        else
        {
            $subject_obj->subject = $request->subject;
            $subject_obj->fee = $request->fee;
            $subject_obj->type = $request->type;

            $subject_obj->save();

            return response()->json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

			DB::beginTransaction();

            $subject = Subject::find($id);
            if (is_null($subject)) {
                $response['success'] = false;
                $response['message'] = "Subject not found.";
                return response()->json($response, 404);
            }

			$subject->delete();

			DB::commit();
			$response['success'] = true;

		} catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Subject not found.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

		return response()->json($response);
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {

            case 'add_new_subject':

                return $this->store($request);

            break;

            case 'btnSaveLevel':

                return $this->btnSaveLevel($request);

            break;

            case 'subjects_list':

                return $this->getSubjectList($request);

            break;

            case 'load_levels':
                return $this->loadLevels($request);

            break;

            case 'add_new_level':

                return $this->addNewLevel($request);

            break;

            case 'update_level':

                return $this->updateLevel($request);

            break;

            case 'load_single_subject':

                return $this->getSubject($request);

            break;

            case 'delete_level':

                return $this->deleteLevel($request);

            break;

            default:
            break;
    	}
    }

    private function deleteLevel($request) {
        try{

			DB::beginTransaction();

            $level = Level::find($request->id);
            if (is_null($level)) {
                $response['success'] = false;
                $response['message'] = "Subject level not found.";
                return response()->json($response, 404);
            }

			$level->delete();

			DB::commit();
			$response['success'] = true;

		} catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Subject level not found.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

		return response()->json($response);
    }

    private function btnSaveLevel($request) {
        $fake_id = $request->fake_id;

        $number_arr = json_decode($request->number_arr, true);
        $name_arr = json_decode($request->name_arr, true);
        $hrs_arr = json_decode($request->hrs_arr, true);
        $level_id_arr = json_decode($request->level_id_arr, true);

        for($x = 0; $x < sizeof($level_id_arr); $x++)
        {

            if($level_id_arr[$x] == 0)
            {

                $insert_level = Level::create([
                    'subject_id' => $request->fake_id,
                    'number' => $number_arr[$x],
                    'name' => $name_arr[$x],
                    'hrs' => $hrs_arr[$x],
                ]);

            }
            else
            {

                $level_obj = Level::where('id', $level_id_arr[$x])->first();

                $level_obj->number = $number_arr[$x];
                $level_obj->name = $name_arr[$x];
                $level_obj->hrs = $hrs_arr[$x];
                $level_obj->save();

            }
        }

        return response()->json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=> 'none'));
    }

    private function updateLevel($request) {
        $level_obj = Level::where('id', $request->update_level_id)->first();

        $level_obj->name = $request->update_level_name;
        $level_obj->hrs = $request->update_level_hrs;

        $level_obj->save();

        return response()->json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=> 'none'));
    }

    private function addNewLevel($request) {
        $insert_level = Level::create([
            'subject_id' => $request->subject_id,
            'number' => $request->level_number,
            'name' => $request->level_name,
            'hrs' => $request->level_hrs,
        ]);
        return response()->json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=> 'none'));
    }

    private function getSubject($request) {
        $data = Subject::where('id', $request->id)->first();
        return json_encode($data);
    }

    private function loadLevels($request) {

        $subject = Subject::where('id', $request->id)->with('level')->first();

        $data['subject'] = $subject;

        return view('backend.school.administrator.subject.ajax.subject-levels')->with($data);
    }

    private function getSubjectList($request) {
        $search = $request->all();
        $currUser = Auth::user();
        $school = $currUser->schoolAdmin;

        $subject = Subject::where('school_id', $school->id);

        if(isset($search['query']['generalSearch']))
        {

            $subject->where(function ($query) use ($search) {
                $query->where('subject', 'LIKE',"%{$search['query']['generalSearch']}%")
                     ->orWhere('fee', 'LIKE',"%{$search['query']['generalSearch']}%");
            });

        }

        $data = $subject->get();

        return json_encode($data);
    }
}
