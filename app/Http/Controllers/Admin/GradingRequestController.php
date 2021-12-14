<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;
use DB;

use App\Models\User;
use App\Models\Child;
use App\Models\Grading;
use App\Models\GradingSubject;
use App\Models\Subject;

class GradingRequestController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Grading Request';
        $page_description = '';

        return view('backend.administrator.grading-request.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    	 	case 'list':
                // DB::enableQueryLog();

                if (Auth::check()) {
                  if(Auth::user()->hasRole('administrator')){

                        $data = Grading::with('child', 'subjects')->get();

                        $subjects_arr  = array();
                        
                        for($x = 0; $x < sizeof($data); $x++)
                        {
                        
                            $subjects = $data[$x]->subjects;

                            $subject_names = array();

                            $get_child = Child::where('id', $data[$x]->children_id)->first();

                            $get_parent = User::where('id', $get_child->parent_id)->first();
                            
                            
                            for($z = 0; $z < sizeof($subjects); $z++) 
                            {
                                $get_subject = Subject::where('id', $subjects[$z]->subject_id)->first();
                                array_push($subject_names, $get_subject->subject);
                            }

                            $data[$x]->subject_names =  $subject_names;
                            $data[$x]->parent_name = $get_parent->first_name . " " . $get_parent->last_name;
                            
                        }
                        return json_encode($data);
                }
            } else
            {
                return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
            }
                // print_r(DB::getQueryLog());
		
    		break;

            // case 'load_grading_subjects':

			// 	$data = GradingSubject::where('grading_id', $request->id)->get();

            //     for($x = 0; $x < sizeof($data); $x++)
            //     {

            //         $subject = Subject::where('id', $data[$x]->subject_id)->first();
            //         $data[$x]->subject_name = $subject->subject;
                   
            //     }

            //     return json_encode($data);

            // break;

            case 'load_grading_subjects':
                if (Auth::check()) {
                    if(Auth::user()->hasRole('administrator')){
                        // $data = Level::where('subject_id', $request->id)->get();
                        // return json_encode($data);

                        $get_obj = GradingSubject::where('grading_id', $request->id)->get();

                        $users = User::role('trainer')->get();
                        // print_r($get_obj);exit;

                        for($x = 0; $x < sizeof($get_obj); $x++)
                        {
        
                            $subject = Subject::where('id', $get_obj[$x]->subject_id)->first();
                            $get_obj[$x]->subject_name = $subject->subject;
                           
                        }
                        $data['role_users'] = $users;
                        $data['subjects'] = $get_obj;		
            
                        return view('backend.administrator.grading-request.ajax.grading-modal')->with($data);
                    }
                }
                else
                {
                    return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
                }
            break;

            case 'schedule_request_grading':

                if (Auth::check()) {
                    if(Auth::user()->hasRole('administrator'))
                    {

                        
                        $date_arr = json_decode($request->date_arr, true);
                        $start_arr = json_decode($request->start_arr, true);
                        $end_arr = json_decode($request->end_arr, true);
                        $id_arr = json_decode($request->id_arr, true);
                        $trainer_arr = json_decode($request->trainer_arr, true);

                        for($x=0; $x < sizeof($date_arr); $x++)
                        {
                            
                            GradingSubject::where('id', $id_arr[$x])
                            ->update([
                                'schedule_date' => $date_arr[$x],
                                'trainer_id' => $trainer_arr[$x],
                                'start_time' => date("H:i", strtotime($start_arr[$x])),
                                'end_time' => date("H:i", strtotime($end_arr[$x])),
                             ]);
                        }

                        return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>[]));
                      
                    }
                } 
            break;
            

    		default:
    			
    			break;
    	}
    }

}
