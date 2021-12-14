<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index()
    {


        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';


        return view('pages.home', compact('page_title', 'page_description'));
    }

    public function dashboard()
    {


        if (Auth::check()) {

            if(Auth::user()->hasRole('administrator'))
            {
               return redirect('/administrator/dashboard');
            }else if(Auth::user()->hasRole('teacher'))
            {
               return redirect('/teacher/dashboard');
            }else if(Auth::user()->hasRole('trainer'))
            {
               return redirect('/trainer/dashboard');
            }else if(Auth::user()->hasRole('parent'))
            {
               return redirect('/parent/dashboard');
            }else if(Auth::user()->hasRole('school_administrator'))
            {
               return redirect('/school-admin/dashboard');
            }else
            {
               return redirect('/');
            }

        }


    }

}
