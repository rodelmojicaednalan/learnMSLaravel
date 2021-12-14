<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Zoom;

use Carbon\Carbon;

class TestController extends Controller
{
    public function index()
    {
        $testUser = User::find(12);
        if (!is_null($testUser)) {
            dd($testUser->parentDetails);
        }

        return response()->json([
            'success' => false,
            'message' => 'No Result Found'
        ]);

    }

    public function testzoom()
    {



        // $get_user = Zoom::user()->find('eugene.chen@orcasg.com');


        // $meeting = Zoom::meeting()->make([
        // 'topic' => 'boom Meetings',
        // 'type' => 8,
        // 'duration' => 120,
        // 'timezone' => "Asia/Singapore",
        // 'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-04-29 10:00:00'),
        // // 'password' => "hacubi",
        // // 'start_time' => new Carbon('2022-04-29 10:00:00'),
        // ]);

        // $meeting->recurrence()->make([
        // 'type' => 1,
        // 'repeat_interval' => 1,
        // 'weekly_days' => "1",
        // 'end_times' => 1 // ilang beses mauulet
        // ]);


        // // $meeting->recurrence()->make([
        // // 'type' => 2,
        // // 'repeat_interval' => 1,
        // // 'weekly_days' => "15",
        // // 'end_times' => 1
        // // ]);

        // $meeting->settings()->make([
        // 'join_before_host' => true,
        // 'approval_type' => 0,
        // 'registration_type' => 1,
        // 'enforce_login' => false,
        // 'waiting_room' => false,
        // ]);

        // $hello =  $get_user->meetings()->save($meeting);

        // $get_meeting = Zoom::meeting()->find('98784194684');

        // $registrant = $get_meeting->registrants()->create([
        //     'email' => 'test@mailinator.com',
        //     'first_name' => 'Mail',
        //     'last_name' => 'Test',
        // ]);




        // print_r($hello->id);

        // echo $hello->join_url."  ";
        // print_r($hello->join_url);



    }

}
