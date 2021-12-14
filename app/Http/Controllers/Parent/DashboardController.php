<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ClassEnrollee;
use App\Models\ClassSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:parent']);
	}
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = '';

        return view('backend.parent.dashboard.index', compact('page_title', 'page_description'));
    }

    public function schedule() {
        $get_class = ClassEnrollee::where('user_id', Auth::user()->id)->get();
        $schedule_array = [];

        foreach ($get_class as $k => $v) {
            $class_sched = ClassSchedule::where('class_id', $v['class_id'])->get();
            if ($class_sched) {
                foreach ($class_sched as $key => $value) {

                    $data['subject_name'] = $value->subject->subject->subject;
                    $data['start'] = $value->start_date . ' ' . $value->start_time;
                    $data['end'] = $value->start_date . ' ' . $value->end_time;
                    $data['title'] = $value->subject->class;
                    $data['description'] = $value->start_time . ' - '. $value->end_time;
                    $data['className'] = ($value->subject->type === 'public') ? 'fc-event-solid-success fc-event-light' : 'fc-event-solid-warning fc-event-light';

                    // return $data;
                    array_push($schedule_array, $data);
                }
            }
        }


        return response()->json($schedule_array);
    }


}
