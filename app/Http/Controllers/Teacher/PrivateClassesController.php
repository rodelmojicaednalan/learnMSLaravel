<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;
use App\Models\ArtbugClass;
use App\Models\Subject;
use App\Models\Level;
use App\Models\User;
use App\Models\ClassSchedule;
use Auth;
use Zoom;
use Carbon\Carbon;


class PrivateClassesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Private Classes';
        $page_description = '';

		$users = User::role('teacher')->get();
		$subjects = Subject::get();

        return view('backend.teacher.classes.index', compact('page_title', 'page_description'))->with('subjects' , $subjects);
    }

	public function meeting()
    {
        $page_title = '';
        $page_description = '';


        return view('backend.teacher.classes.zoom', compact('page_title', 'page_description'));
    }

	public function ajax($section, Request $request)
    {
    	switch ($section) {

			case 'add_new_class':

			if (Auth::check()) {
				if(Auth::user()->hasRole('teacher'))
				{

				

					$start_time  = date("H:i", strtotime($request->start_time));
					$end_time  = date("H:i", strtotime($request->end_time));


					$class_id = $request->class_id;

				
					$artclass_obj = ArtbugClass::where('id', $class_id)->first();

					$validator = \Validator::make($request->all(), [
						'class_name' => 'required',
						'level' => 'required',
					]);
					
					if ($validator->fails())
					{
						return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
					}

					if(empty($artclass_obj)) 
					{   
									
						$insert_id = ArtbugClass::create([
							'class' => $request->class_name,
							'subject_id' =>$request->subject,    
							'level_id' =>$request->level,   
							'teacher_id' => Auth::user()->id,
							'fee' => $request->fee,
							'type' => "private",                           
						]);

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
					}
					else  
					{
						$artclass_obj->class = $request->class_name;
						$artclass_obj->subject_id = $request->subject;
						$artclass_obj->level_id = $request->level;
						$artclass_obj->fee = $request->fee;

						$artclass_obj->save();

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
					}

				}
			}
			else
			{
				return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
			}

                break;


			case 'add_new_schedule':
				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher')){

						$get_class = ArtbugClass::where('id', $request->class_id)->first();
						$get_subject = Subject::where('id', $get_class->subject_id)->first();

						$get_zoom = Zoom::user()->find('eugene.chen@orcasg.com');

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
							// 'start_time' => new Carbon('2022-04-29 10:00:00'),
							]);

							$meeting->recurrence()->make([
							'type' => 1,
							'repeat_interval' => 1,
							'weekly_days' => "1",
							'end_times' => 1 // ilang beses mauulet
							]);
					
						  
							// $meeting->recurrence()->make([
							// 'type' => 2,
							// 'repeat_interval' => 1,
							// 'weekly_days' => "15",
							// 'end_times' => 1
							// ]);
					
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
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				}
				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
			break;

			case 'update_single_schedule':
				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher')){

						
						$schedule_obj = ClassSchedule::where('id', $request->update_schedule_id)->first();

						$get_train = ArtbugClass::where('id', $schedule_obj->class_id)->first();
						$get_subject = Subject::where('id', $get_train->subject_id)->first();
						$get_user = User::where('id', $get_train->trainer_id)->first();

						$get_date = date("Y-m-d", strtotime($request->start_date2));
						$get_time = date("H:i:s", strtotime($request->start_time2));

						$date_str = $get_date." ".$get_time;

						$get_zoom = Zoom::user()->find('eugene.chen@orcasg.com');

						$get_url = "";
						$get_mid = "";

						$to_time = strtotime($request->start_time2);
						$from_time = strtotime($request->end_time2);
						$str_duration =  round(abs($to_time - $from_time) / 60,2);

						if($get_zoom != null)
						{

							$get_meeting = Zoom::meeting()->find($schedule_obj->meeting_id);


							if($get_meeting != null)
							{
							$get_meeting->delete();
							}


						  $meeting = Zoom::meeting()->make([
							'topic' => $get_subject->subject,
							'type' => 8,
							'duration' => $str_duration,
							'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $date_str, 'UTC'),
							// 'start_time' => new Carbon('2022-04-29 10:00:00'),
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

						$schedule_obj->start_date = $request->start_date2;
						$schedule_obj->start_time = date("H:i", strtotime($request->start_time2));
						$schedule_obj->end_time = date("H:i", strtotime($request->end_time2));
						$schedule_obj->meeting_id = $get_mid;
						$schedule_obj->meeting_url = $get_url;

						$schedule_obj->save();


						return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>['Invalid session']));
					}
				  }
				  else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
			break;

			case 'load_levels':
				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher'))
					{
						$data = Level::where('subject_id', $request->id)->get();
						return json_encode($data);

					}
				}

				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
				
			break;
    		case 'list':

				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher'))
					{

						$data = ArtbugClass::with('schedule','user' , 'subject','level')->where('teacher_id', Auth::user()->id)->where('type', 'private')->get();
						return json_encode($data);

					}
				}

				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
    				
    				// echo 'test';
    		break;

			case 'load_schedules':
				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher')){
						// $data = Level::where('subject_id', $request->id)->get();
						// return json_encode($data);

						$get_obj = ArtbugClass::where('id', $request->id)->with('schedule')->first(); ### Use first instead of get because you are only expecting 1 record
						
						$data['public_classes'] = $get_obj;		
			
						return view('backend.teacher.classes.ajax.schedule-modal')->with($data);
					}
				  }
				  else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
			break;

			case 'load_single_class':
				if (Auth::check()) {
					if(Auth::user()->hasRole('teacher'))
					{
						$data = ArtbugClass::where('id', $request->id)->first();
						return json_encode($data);
					}
				}else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
			break;
    		    		
    		default:
    			
    			break;
    	}
    }
}
