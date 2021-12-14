<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Child;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\mdCountry;

class ParentProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:parent']);
    }

    public function index()
    {
        $page = 'profile page-parent-child-profile';
        $page_title = "Parent/child Profile";
        $countries = mdCountry::all();
        return view('frontend.parent.profile', compact('page', 'page_title'))->with('countries' , $countries);
    }

    public function calendar()
    {
        $page = 'calendar';
        $page_title = "Calendar";
        return view('frontend.parent.calendar', compact('page', 'page_title'));
    }

    public function dashboard()
    {
        $page = 'dashboard page-parent-dashboard';
        $page_title = "Parent Dashboard";
        return view('frontend.parent.dashboard', compact('page', 'page_title'));
    }
    public function result()
    {
        $page = 'result';
        $page_title = "Result";
        return view('frontend.parent.result', compact('page', 'page_title'));
    }

    public function ClassPreRecorded()
    {
        $page = 'class-pre-recorded';
        $page_title = "Parent class Pre Recorded";
        return view('frontend.parent.class-pre-recorded', compact('page', 'page_title'));
    }
    public function ajax($section, Request $request)
    {
        switch ($section) {

            case 'get_selected_skills':
                return $this->getSelectedRelatedSkills();
                break;

            case 'update_profile':
                return $this->processUpdateProfile($request);
                break;

            case 'get_child_details':
                return $this->getChildDetails($request);
                break;

            case 'update_child_profile':
                return $this->processUpdateChildProfile($request);
                break;

            case 'add_child_profile':
                return $this->processAddChildProfile($request);
                break;

            case 'delete_child_profile':
                return $this->processDeleteChildProfile($request);
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

            auth()->user()->parentDetails()->update([
                'profile_picture' => $imageName
            ]);

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/parent/profile/image
             */
            if ($imageName) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/parent/profile/image',
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

    public function processDeleteChildProfile($request)
    {


        try {

            DB::beginTransaction();

            Child::find($request->id)->delete();

            DB::commit();
            $response['success'] = true;
            $response['deleted'] = true;
            $response['message'] = 'Child profile deleted.';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on deleting profile.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    public function processAddChildProfile($request)
    {
        // return response()->json($request->all());
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required',
            'birthdate' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        try {

            DB::beginTransaction();

            // $child = new Child($request->all());

            auth()->user()->children()->create($request->all());

            DB::commit();
            $response['success'] = true;
            $response['added'] = true;
            $response['message'] = 'Child Profile Added';
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding profile.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    public function processUpdateChildProfile($request)
    {
        // return response()->json($request);
        $validator = \Validator::make($request->all(), [
            'full_name' => 'required',
            'birthdate' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        try {

            DB::beginTransaction();

            Child::where('id', $request->id)
                ->update($request->except('_method'));

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

    public function getChildDetails($request)
    {
        $child = Child::find($request->id);
        return response()->json($child);
    }

    public function processUpdateProfile($request)
    {
        $related_skills = [];
        $user = $request->only(
            'first_name',
            'last_name',
            'contact_number',
            'gender',
        );

        $details = $request->only(
            'country_of_incorporation',
            // 'highest_education_qualification',
            // 'name_of_institution',
            'spoken_language',
            'formatted_related_skills',
            // 'related_skills',
            'description'
        );

        $validator = \Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'country_of_incorporation' => 'required',
            'spoken_language' => 'required',
            'description' => 'required',
            'relationship' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->messages()
            ], 422);
        }

        if ($request->has('related_skills') && sizeOf($request->related_skills) > 0) {
            $request->merge([
                'related_skills' => $request->formatted_related_skills,
            ]);

            $related_skills = $request->only('related_skills');
        }

        try {

            DB::beginTransaction();

            auth()->user()->update($user);
            auth()->user()->parentDetails->fill(
                array_merge($details, $related_skills)
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
}
