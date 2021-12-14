<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\mdCountry;
use App\Models\TeacherPurchased;
use App\Models\Curriculum;
use App\Models\StudentLevel;
use App\Models\Programmes;
use App\Models\Classes;
use App\Models\LiveClassSchedule;

class TeacherProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:teacher']);
    }

    public function index()
    {
        $page = 'profile page-teacher-profile';
        $page_title = "Teacher Profile";
        $countries = mdCountry::all();
        return view('frontend.teacher.profile', compact('page', 'page_title'))->with('countries', $countries);
    }

    public function calendar()
    {
        $page = 'calendar';
        $page_title = "Calendar";
        return view('frontend.teacher.calendar', compact('page', 'page_title'));
    }

    public function dashboard()
    {
        $page = 'dashboard page-teacher-dashboard';
        $page_title = "Teacher Dashboard";

        $class_levels = StudentLevel::all()->groupBy('name');

        return view('frontend.teacher.dashboard', compact('page', 'page_title', 'class_levels'));
    }

    public function result()
    {
        $page = 'result';
        $page_title = "Result";
        return view('frontend.teacher.result', compact('page', 'page_title'));
    }

    public function CurriculumPreRecorded()
    {
        $page = 'curriculum-pre-recorded';
        $page_title = "Teacher Curriculum Pre Recorded";
        return view('frontend.teacher.curriculum-pre-recorded', compact('page', 'page_title'));
    }
     public function meetings()
    {
        $page = 'meetings';
        $page_title = "Meetings";
        return view('frontend.teacher.meetings', compact('page', 'page_title'));
    }
    public function ajax($section, Request $request)
    {
        switch ($section) {
            case 'upload_profile_image':
                return $this->processUploadProfileImage($request);
                break;

            case 'get_selected_skills':
                return $this->getSelectedRelatedSkills();
                break;

            case 'update_profile':
                return $this->processUpdateProfile($request);
                break;

            case 'update_social_links':
                return $this->processUpdateSocialMedia($request);
                break;

            default:
                # code...
                break;
        }
    }

    public function processUpdateSocialMedia($request)
    {

        try {

            DB::beginTransaction();

            foreach ($request->except('_token') as $key => $value) {
                $social_media_name = ucfirst($key);
                SocialLink::updateOrCreate(
                    [
                        'user_id'    => auth()->user()->id,
                        'social_media_name'  => $social_media_name,
                    ],
                    [
                        'social_media_link'  => $value,
                    ]
                );
            }

            DB::commit();
            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Social media links updated';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    public function processUpdateProfile($request)
    {

        $user = $request->only(
            'first_name',
            'last_name',
            'contact_number',
            'gender',
        );

        $details = $request->only(
            'country_of_incorporation',
            'highest_education_qualification',
            'name_of_institution',
            'spoken_language',
            'formatted_related_skills',
            // 'related_skills',
            'description'
        );

        $validator = \Validator::make($user, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if (sizeOf($request->related_skills) > 0) {
            $request->merge([
                'related_skills' => $request->formatted_related_skills,
            ]);
        }



        try {

            DB::beginTransaction();

            auth()->user()->update($user);
            auth()->user()->teacherDetails->fill(
                array_merge($details, $request->only('related_skills'))
            )->save();

            DB::commit();
            $response['success'] = true;
            $response['updated'] = true;
            $response['message'] = 'Profile Updated';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating profile.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    public function getSelectedRelatedSkills()
    {
        $skills = [];
        if (auth()->user()->teacherDetails()->count()) {
            $skills = auth()->user()->teacherDetails->related_skills;
            $skills = explode(', ', $skills);
        }

        return response()->json($skills);
    }

    private function processUploadProfileImage($request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = time() . '_' . $imagePath->getClientOriginalName();

            // $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }

        try {

            DB::beginTransaction();

            auth()->user()->teacherDetails()->update([
                'profile_picture' => $imageName
            ]);

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/profile/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/teacher/profile/image',
                    $request->file,
                    $imageName
                );
            }

            $response['success'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on uploading image.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }
}
