<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassEnrollee;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth','role:teacher']);
	}
    public function index()
    {
        $page_title = 'Students';
        $page_description = '';

        return view('backend.teacher.students.index', compact('page_title', 'page_description'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {
    		case 'list':
    				$data = ClassEnrollee::with('class', 'child')
                                ->whereHas('class', function($q) {
                                    $q->where('teacher_id', auth()->user()->id);
                                })->get();


    				return json_encode($data);
    			break;

    		default:

    			break;
    	}
    }
}
