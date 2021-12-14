<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobOpeningsController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Job Opening';
        $page_description = '';

        return view('backend.teacher.job-openings.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'list':
    				// $users = User::where('active',1)->get()

    				$arr[] = ['class'=>'Speech & Drama' ,'date'=> '05 Feb 2021', 'time' => "1400-1500 hrs" , 'salary' => '$80'];
                    $arr[] = ['class'=>'Art & Craft' ,'date'=> '05 Feb 2021', 'time' => "1400-1500 hrs" , 'salary' => '$120'];
    				
    				// echo 'test';

    				return json_encode($arr);
    			break;
    		    		
    		default:
    			
    			break;
    	}
    }
}
