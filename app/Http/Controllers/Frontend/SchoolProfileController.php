<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function index()
    {
        $page = 'profile page-school-profile';
        $page_title = "School Profile";

        $school = auth()->user()->schoolAdmin;
        $teacher_list = $school->teacher()->with('teacherDetails')->paginate(6);
        return view('frontend.school.profile', compact('page', 'page_title', 'teacher_list', 'school'));
    }

    public function ajax($section, Request $request)
    {
        switch ($section) {

            case 'update_profile':
                return $this->processUpdateProfile($request);
                break;

            case 'get_selected_skills':
                return $this->getSelectedRelatedSkills();
                break;

            case 'upload_profile_image':
                return $this->processUploadProfileImage($request);
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

            auth()->user()->schoolAdmin()->update([
                'logo' => $imageName
            ]);

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/teacher/profile/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/school/profile/image',
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

    public function getSelectedRelatedSkills()
    {
        $skills = [];
        if (auth()->user()->schoolAdmin()->count()) {
            $skills = auth()->user()->schoolAdmin->related_skills;
            $skills = explode(', ', $skills);
        }

        return response()->json($skills);
    }


    public function processUpdateProfile($request)
    {

        $user = $request->only(
            'contact_number',
        );

        $details = $request->only(
            'country_of_incorporation',
            'address',
            'school_name',
            'spoken_language',
            'formatted_related_skills',
            'company_registration_number',
            'description'
        );

        $validator = \Validator::make($request->all(), [
            'school_name' => 'required',
            'company_registration_number' => 'required',
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
            auth()->user()->schoolAdmin->fill(
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
}
