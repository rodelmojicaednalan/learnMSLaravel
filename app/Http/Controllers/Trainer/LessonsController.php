<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;

use App\Models\Lesson;
use App\Models\Training;
use App\Models\TrainingSchedule;
use App\Models\TrainingApplicant;

class LessonsController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:trainer']);
	}
    public function index()
    {
        $page_title = 'Lessons';
        $page_description = '';

        return view('backend.trainer.lessons.index', compact('page_title', 'page_description'));
    }

	public function meeting()
    {
        $page_title = '';
        $page_description = '';

        return view('backend.trainer.lessons.zoom', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {

			case 'add_new_lesson':
                  

				$start_time  = date("H:i", strtotime($request->start_time));
				$end_time  = date("H:i", strtotime($request->end_time));


                $fake_id = $request->fake_id;

               
                $lessson_obj = Lesson::where('id', $fake_id)->first();



				
				$validator = \Validator::make($request->all(), [
					'class_name' => 'required',
					'start_time' => 'required',
					'end_time' => 'required',
				]);
				
				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                if(empty($lessson_obj)) 
                {   
                                
                    $insert_id = Lesson::create([
						'class' => $request->class_name,
                        'class_date' => $request->txt_date,
                        'class_start_time' => $start_time,
						'class_end_time' => $end_time,                    
                    ]);

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
				}
                else  
                {
                    $lessson_obj->partner = $request->partner;
                    $lessson_obj->deals_description = $request->description;
                    $lessson_obj->terms = $request->terms;
                    
                    $lessson_obj->save();

					return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
                }

                break;

			case 'load_teachers':
				if (Auth::check()) {
					if(Auth::user()->hasRole('trainer')){
						// $data = Level::where('subject_id', $request->id)->get();
						// return json_encode($data);

						$get_obj = TrainingApplicant::where('training_id', $request->id)->with('user')->get(); ### Use first instead of get because you are only expecting 1 record
						
					
						
						$data['teachers'] = $get_obj;	
						
						// print_r($data);exit;

						return view('backend.trainer.lessons.ajax.teachers-modal')->with($data);
					}
				}
				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
			break;
    		case 'list':
				if (Auth::check()) {

					if(Auth::user()->hasRole('trainer')){
	
					
							$get_obj = Training::where('trainer_id', Auth::user()->id)->with('schedule', 'user' , 'subject')->get();


							for($x=0; $x < sizeof($get_obj); $x++) 
							{

								$get_latest = TrainingSchedule::orderBy('start_date','DESC')->where('training_id' , $get_obj[$x]->id)->first();

								if ($get_latest != null)
								{
									$get_obj[$x]->latest_date = $get_latest->start_date;
                                    $today = date("Y-m-d");

									if(strtotime($get_latest->start_date) > strtotime($today))
									{
										$get_obj[$x]->for_grading = true; 
									}
									else {
										$get_obj[$x]->for_grading = false; 
									}

					
								
								
								}
								else {
									$get_obj[$x]->latest_date = "none";
									$get_obj[$x]->for_grading = false; 
								}


								
							}
	
							return json_encode($get_obj);
	
					}
					}
	
					else
					{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
					}
    			break;

				case 'load_single_lesson':
    				$data = Lesson::where('id', $request->id)->first();

    				return json_encode($data);
    			break;
    		    		
    		default:
    			
    			break;
    	}
    }
}