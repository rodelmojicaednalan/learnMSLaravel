<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;

use App\Models\TrainingSchedule;
use App\Models\Subject;
use App\Models\User;
use App\Models\ClassSchedule;

class DashboardController extends Controller
{

    public function __construct()
	{
        $this->middleware(['auth','role:administrator']);
	}

    public function index()
    {
        $page_title = 'Dashboard';
        // $page_description = 'Some description for the page';
        $page_description = '';

        $data = TrainingSchedule::with('training')->get();

        $class_data = ClassSchedule::with('subject')->get();

        for($z = 0; $z < sizeof($data); $z++)
        {
            if($data[$z]->training->subject()->count()) {
                $get_subject = Subject::where('id', $data[$z]->training->subject)->first();
                $get_user = User::where('id', $data[$z]->training->trainer_id)->first();

                $data[$z]->subject_name = $data[$z]->training->subject->subject;
                $data[$z]->trainer_name = $get_user->first_name . " " . $get_user->last_name;
                $time_str = date("g:iA", strtotime($data[$z]->start_time))." - ".date("g:iA", strtotime($data[$z]->end_time));
                $data[$z]->title = $time_str;
                $data[$z]->description = "Subject: ".$data[$z]->subject_name.", Trainer: ". $data[$z]->trainer_name;
            }

        }

        for($x = 0; $x < sizeof($class_data); $x++)
        {

            if ($class_data[$x]->subject()->count()) {
                $get_subject = Subject::where('id', $class_data[$x]->subject->subject_id )->first();

                if (!is_null($get_subject)) {
                    $class_data[$x]->subject_name = $get_subject->subject;
                }

                $get_user = User::where('id', $class_data[$x]->subject->teacher_id)->first();

                if (!is_null($get_user)) {
                    $class_data[$x]->teacher_name = $get_user->first_name . " " . $get_user->last_name;
                }

                $time_str = date("g:iA", strtotime($class_data[$x]->start_time))." - ".date("g:iA", strtotime($class_data[$x]->end_time));;
                $class_data[$x]->title = $time_str;
                $class_data[$x]->description = "Subject: ".$class_data[$x]->subject_name.", Teacher: ". $class_data[$x]->teacher_name;
            }
        }

        return view('backend.administrator.dashboard.index', compact('page_title', 'page_description'))->with('schedules' , $data)->with('class_data' , $class_data);
    }

}
