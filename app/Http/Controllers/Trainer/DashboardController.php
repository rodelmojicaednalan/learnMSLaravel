<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use Auth;


class DashboardController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:trainer']);
	}
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '';

        
		$get_obj = Training::where('trainer_id', Auth::user()->id)->with('schedule', 'user' , 'subject')->get();

        $data = $get_obj;

        $schedules_arr = [];
        $ctr=0;

        // print_r($data[0]->subject->subject);exit;

        for($z = 0; $z < sizeof($data); $z++) 
        {
        
            $get_schedules = $data[$z]->schedule;
             
            for($x=0; $x  < sizeof($get_schedules); $x++)
            {
               $schedules_arr[$ctr]['subject_name'] = $data[$z]->subject->subject;
               $schedules_arr[$ctr]['start_date'] = $get_schedules[$x]->start_date;
               $schedules_arr[$ctr]['start_time'] = $get_schedules[$x]->start_time;
               $schedules_arr[$ctr]['end_time'] = $get_schedules[$x]->end_time;
               $time_str = date("g:iA", strtotime($get_schedules[$x]->start_time))." - ".date("g:iA", strtotime($get_schedules[$x]->end_time));
               $schedules_arr[$ctr]['title'] = $time_str;
               $schedules_arr[$ctr]['description'] = "Subject: ". $data[$z]->subject->subject;
               $ctr++;
            }
            
        }

        // print_r($schedules_arr);exit;

        
	

        return view('backend.trainer.dashboard.index', compact('page_title', 'page_description'))->with('schedules' , $schedules_arr);
    }
}
