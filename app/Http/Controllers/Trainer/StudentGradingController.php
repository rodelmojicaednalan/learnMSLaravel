<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;


use App\Models\User;
use App\Models\Child;
use App\Models\Grading;
use App\Models\GradingSubject;
use App\Models\Subject;

class StudentGradingController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:trainer']);
	}
    public function index()
    {
        $page_title = 'Student Grading';
        $page_description = '';

        return view('backend.trainer.student-grading.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
  
    		case 'list':
				if (Auth::check()) {

					if(Auth::user()->hasRole('trainer')){
	
					
                        $data = GradingSubject::where('trainer_id', Auth::user()->id)->with('subject')->get();

                        for($x = 0; $x < sizeof($data); $x++)
                        {

                            $get_grading = Grading::where('id', $data[$x]->grading_id)->first();

                            $get_child = Child::where('id', $get_grading->children_id)->first();

                            $get_parent = User::where('id', $get_grading->parent_id)->first();

                            $data[$x]->child_name =  $get_child->firstname;
                            $data[$x]->parent_name = $get_parent->first_name . " " . $get_parent->last_name;
                        
                        }

                        // print_r(DB::getQueryLog());
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