<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRolesController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'User Roles';
        $page_description = '';

        return view('backend.administrator.roles.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'list':
    				// $users = User::where('active',1)->get()

    				$arr[] = ['roleID'=>'1','role'=>'Trainer'];
    				$arr[] = ['roleID'=>'2','role'=>'Teacher'];
                    $arr[] = ['roleID'=>'3','role'=>'Student/Parents'];
                    $arr[] = ['roleID'=>'4','role'=>'Administrator'];
    				// echo 'test';

    				return json_encode($arr);
    			break;
    		    		
    		default:
    			
    			break;
    	}
    }


}
