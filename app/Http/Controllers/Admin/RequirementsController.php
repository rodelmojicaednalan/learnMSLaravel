<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    public function __construct()
	{
        $this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Requirements';
        $page_description = '';

        return view('backend.administrator.requirements.index', compact('page_title', 'page_description'));
    }
}
