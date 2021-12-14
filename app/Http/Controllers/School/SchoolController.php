<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Http\Requests\School\StoreRequest;
use App\Http\Requests\School\UpdateRequest;
use App\Models\School;
use App\Models\User;
use App\Models\mdCountry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'School';

		$all_roles_in_database = Role::all();
        $countries = mdCountry::all();

        return view('backend.administrator.school.index', compact('page_title', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

       
        $response = [];

        $request->merge(['password' => Hash::make($request->password)]);

        $user = $request->only(
            'first_name',
            'last_name',
            'email',
            'password'
        );

        $school = $request->only(
            'school_name',
            'address',
            'description',
        );

        if ( $request->has('logo') && !empty( $request->file('logo') ) ) {

            // Get the file uploaded
            $schoolUploadedFile = $request->logo;

            //  Rename the file to <current timestamp>_<file original name>
            $schoolLogoFileName = time(). '_' . $schoolUploadedFile->getClientOriginalName();

            $school['logo'] = $schoolLogoFileName;
        }

        try {

            DB::beginTransaction();

            /*
             * Create User Details
             */
            $created = User::create($user);

            /*
             * Assign User to a Role
             */

            $role = Role::findOrCreate('school_administrator');

            User::find($created->id)->assignRole($role->name);

            $create_school = $this->saveSchoolDetails( $school, $created->id );

            DB::commit();

            /*
             * Upload User avatar in public/storage/uploads/school/logo
             */
            if ( !empty($school['logo']) ) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/school/logo/',
                    $schoolUploadedFile,
                    $school['logo']
                );
            }
            event(new Registered($created));
            $response['success'] = true;

        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding school.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return response()->json($school->load('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, School $school)
    {
        $user = $request->only(
            'first_name',
            'last_name',
        );

        $details = $request->only(
            'school_name',
            'address',
            'description',
        );

        if ( $request->has('logo') && !empty( $request->file('logo') ) ) {
            // Get the file uploaded
            $schoolUploadedFile = $request->logo;

            //  Rename the file to <current timestamp>_<file original name>
            $schoolfilename = time(). '_' . $schoolUploadedFile->getClientOriginalName();

            $details['logo'] = $schoolfilename;
        }

        if ( $request->has('password') && !empty( $request->input('password') ) ) {
            $user['password'] = Hash::make($request->password);
        }

        try {

            DB::beginTransaction();

            $school->update($details);
            $school->user->fill($user)->save();

            /*
             * Upload User avatar in public/storage/uploads/user/avatar
             */
            if ( !empty($details['logo']) ) {

                // Upload the file on the storage folder
                $upload = Storage::disk('public')->putFileAs(
                    'uploads/school/logo/',
                    $schoolUploadedFile,
                    $school['logo']
                );
            }

            DB::commit();
            $response['success'] = true;
            $response['updated'] = true;

        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating school.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        try{

			DB::beginTransaction();

			$school->delete();

			DB::commit();
			$response['success'] = true;

		} catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on deleting school.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

		return response()->json($response);
    }

    public function ajax($section) {
        switch ($section) {
            case 'list':
                return $this->getSchoolList();
                break;
            case 'teachers':
                return $this->getTeacherList();
                break;
            default:
                # code...
                break;
        }
    }

    public function dashboard() {
        $page_title = 'Dashboard';
        return view('backend.school.administrator.dashboard.index', compact('page_title'));
    }

    public function teachers() {
        $countries = mdCountry::all();
        return view('backend.school.administrator.teacher.index')->with('countries', $countries);
    }

    private function getTeacherList() {

        $school = Auth::user()->schoolAdmin;

        return response()->json($school->teacher);

    }

    private function saveSchoolDetails($data, $user)
    {
    	return School::create( array_merge( $data , ['user_id' => $user]) );
    }

    private function getSchoolList() {
        $school = School::with('user')
                    ->get();
        return response()->json($school);
    }
}
