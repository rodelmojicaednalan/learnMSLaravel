<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SocialLink;
use App\Models\TeacherDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class SchoolTeacherProfileController extends Controller
{
    public function index(Request $request, $id)
    {
        $page = 'School Teacher Profile';
        $page_title = "School Teacher Profile";
        $teacher_profile = User::with('teacherDetails', 'teacher', 'social_link')->find($id);
        return view('frontend.general.school-teacher-profile', compact('page', 'page_title', 'teacher_profile'));
        
    }

}
