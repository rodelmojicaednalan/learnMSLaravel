<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Response;
use DB; 
use App\Models\Training;
use App\Models\TrainingSchedule;
use App\Models\Subject;
use App\Models\User;
use Zoom;
use Carbon\Carbon;

class TrainingSchedulesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Training Schedules';
        // $page_description = 'List of training schedules';
        $page_description = '';

		
		$subjects = Subject::all();

		$users = User::role('trainer')->get();

        return view('backend.administrator.training-schedules.index', compact('page_title', 'page_description'))->with('subjects' , $subjects)->with('users' , $users);
    }

	public function meeting()
    {
        $page_title = '';
        // $page_description = 'List of training schedules';
        $page_description = '';

        return view('backend.administrator.training-schedules.zoom', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
			case 'add_training':
                  
				// print_r($request->all());exit;

				if (Auth::check()) {

					if(Auth::user()->hasRole('administrator')){

								$trainer_id = $request->trainer_id;


								$training_obj = Training::where('id', $trainer_id)->first();



                                //   print_r($request->all());exit;

								$validator = \Validator::make($request->all(), [
								'slot' => 'required',
								'title' => 'required',
								]);

								if ($validator->fails())
								{
								return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
								}

								if(empty($training_obj)) 
								{   

								$insert_id = Training::create([
								'subject_id' => $request->subject,
								'trainer_id' => $request->trainer,
								'slots' =>$request->slot,  
								'title' =>$request->title,                  
								]);

								return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
								}
								else  
								{
								$training_obj->subject_id =  $request->subject;
								$training_obj->trainer_id = $request->trainer;
								$training_obj->slots = $request->slot;
								$training_obj->title = $request->title;

								$training_obj->save();

	
								return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
								}

			      }

			    }
				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}

                break;
    			case 'list':
					
					
				if (Auth::check()) {

				if(Auth::user()->hasRole('administrator')){

						$search = $request->all();
						

						$query = Training::with('schedule', 'user' , 'subject');


						if(isset($search['query']['trainer']))
						{
							$query = $query->where('trainer_id', $search['query']['trainer']);
						}

						if(isset($search['query']['subject']))
						{
							$query = $query->where('subject_id', $search['query']['subject']);
						}


						if(isset($search['query']['generalSearch']))
						{

							$query->where(function ($query) use ($search) {
							$query->where('title', 'LIKE',"%{$search['query']['generalSearch']}%") 
							->orWhere('slots', 'LIKE',"%{$search['query']['generalSearch']}%");
							});

						}


						$data = $query->get();

						return json_encode($data);

				}
				}

				else
				{
				return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
    			
    			break;

				case 'load_schedules':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){
							// $data = Level::where('subject_id', $request->id)->get();
							// return json_encode($data);

							$get_obj = Training::where('id', $request->id)->with('schedule')->first(); ### Use first instead of get because you are only expecting 1 record
							
							$subjects = Subject::all();
							$users = User::role('trainer')->get();

							$data['training'] = $get_obj;		
				
							return view('backend.administrator.training-schedules.ajax.training-modal')->with($data);
						}
				  	}
				  	else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;
				case 'add_new_schedule':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){

				


							$get_train = Training::where('id', $request->training_id)->first();
							$get_subject = Subject::where('id', $get_train->subject_id)->first();
					    
							$get_user = User::where('id', $get_train->trainer_id)->first();

			

							$get_date = date("Y-m-d", strtotime($request->start_date));
							$get_time = date("H:i:s", strtotime($request->start_time));

							$date_str = $get_date." ".$get_time;

							$to_time = strtotime($request->start_time);
							$from_time = strtotime($request->end_time);
							$str_duration =  round(abs($to_time - $from_time) / 60,2);

							$get_zoom = Zoom::user()->find('eugene.chen@orcasg.com');

							$get_url = "";
							$get_mid = "";

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


								$training_insert = TrainingSchedule::create([
									'training_id' => $request->training_id,   
									'start_date' => $request->start_date,   
									'start_time' => date("H:i", strtotime($request->start_time)),   
									'end_time' => date("H:i", strtotime($request->end_time)), 
									'meeting_id' => $get_mid,
									'meeting_url' => $get_url,
								]);

							return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>['Invalid session']));
						}
				  	}
				  	else
					{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
				break;

				case 'update_single_schedule':
					if (Auth::check()) {
						if(Auth::user()->hasRole('administrator')){


							$get_schedule = TrainingSchedule::where('id', $request->update_schedule_id)->first();
							$get_train = Training::where('id', $get_schedule->training_id)->first();
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
  
								$get_meeting = Zoom::meeting()->find($get_schedule->meeting_id);


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
						

						
							
							$schedule_obj = TrainingSchedule::where('id', $request->update_schedule_id)->first();

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
		

				case 'load_single_training':

                			
				if (Auth::check()) {
					if(Auth::user()->hasRole('administrator')){

					// $data = DB::table('training_schedule')->
					// select('training_schedule.id','training_schedule.subject' , 'training_schedule.trainer' , 'training_schedule.slots' , 'training_schedule.participants')->
					// where('id', $request->id)->get();

					$data = Training::where('id', $request->id)->get();

    				return json_encode($data);

				    }
				}
				else
				{
				return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}

    			break;
    		    		
    		default:
    			
    			break;
    	}
    }
}
