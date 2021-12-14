<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;

use App\Models\Level;
use App\Models\Lesson;
use App\Models\Training;
use App\Models\TrainingApplicant;
use App\Models\TrainingSchedule;
use App\Models\Curriculum;

class TrainingSchedulesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Training Schedule';
        $page_description = '';

		$count = TrainingApplicant::where('user_id', Auth::user()->id)->count();

        return view('backend.teacher.training-schedule.index', compact('page_title', 'page_description'))->with("data_count" , $count);
    }

	
	public function meeting()
    {
		$page_title = 'Training Schedule';
        $page_description = '';

		$count = TrainingApplicant::where('user_id', Auth::user()->id)->count();

        return view('backend.teacher.training-schedule.zoom', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'list':
				if (Auth::check()) {

					if(Auth::user()->hasRole('teacher')){

						   $search = $request->all();

                            $training_schedule = TrainingApplicant::where('user_id', Auth::user()->id)->pluck('training_id')->toArray();

							$get_obj = Training::whereNotIn('id', $training_schedule)
                                    ->with('schedule', 'user' , 'subject');


								if(isset($search['query']['generalSearch']))
								{

								$get_obj->where(function ($get_obj) use ($search) {
								$get_obj->where('title', 'LIKE',"%{$search['query']['generalSearch']}%")  
								->orWhere('slots', 'LIKE',"%{$search['query']['generalSearch']}%");
								});

								}

							$get_obj  = $get_obj->get();

							for($x=0; $x < sizeof($get_obj); $x++)
							{
								$training_applicant = TrainingApplicant::where('training_id', $get_obj[$x]->id)->get();
								$training_count = $training_applicant->count();

								if($training_count >  $get_obj[$x]->slots)
								{
									$get_obj[$x]->slots  = 0;

								}
								else {
									$get_obj[$x]->slots = $get_obj[$x]->slots - $training_count;
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

				case 'materials_list':

					$get_levels = Level::where('subject_id', $request->subject_id)->where('number', "1")->first();

					$data = Curriculum::where('level_id', $get_levels->id)->get();
    				return json_encode($data);
				
				
				break;

				case 'training_list':
					if (Auth::check()) {
	
						if(Auth::user()->hasRole('teacher')){
	
								
							$get_obj = TrainingApplicant::where('user_id', Auth::user()->id)->get();

	
								for($x=0; $x < sizeof($get_obj); $x++)
								{

									$get_training = Training::where('id', $get_obj[$x]->training_id)
                                    ->with('schedule', 'user' , 'subject')->get();

									$get_obj[$x]->training = $get_training;

								}
							
								return json_encode($get_obj);
						}
						}
	
						else
						{
						return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
						}
					break;

				case 'enroll':
					if (Auth::check()) {

						if(Auth::user()->hasRole('teacher')) {

								$training_applicant = TrainingApplicant::where('training_id', $request->id)->get();
								$training_count = $training_applicant->count();

								$check_if_enrolled = TrainingApplicant::where('training_id', $request->id)->where('user_id',  Auth::user()->id)->get();



								$av_slots = $request->slots - $training_count;

								// echo $training_count."<br>";
								// echo $request->slots."<br>";

								// echo $av_slots."<br>";

								// print_r($check_if_enrolled);exit;

								



								if($av_slots <= 0)
								{
									return Response::json(array('error'=>true , 'message'=>'','errors'=>['No slots available']));
								}
							    else if($check_if_enrolled->isNotEmpty())
								{
									return Response::json(array('error'=>true , 'message'=>'','errors'=>['You already enrolled in this training']));
								}
								else {

										$insert_level = TrainingApplicant::create([
										'training_id' => $request->id,
										'user_id' =>  Auth::user()->id,
										]);

								}




								return Response::json(array('error'=>false , 'message'=>'Enrolled Successfully'));
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
