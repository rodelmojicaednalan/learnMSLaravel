<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherDetail;


class SchoolTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $currUser = Auth::user();
        $school = $currUser->schoolAdmin;
        $school_id = $school->id;

   

        $response = [];

        $request->merge(['password' => Hash::make($request->password)]);

        $user = $request->only(
            'first_name',
            'last_name',
            'email',
            'password'
        );

        try {

            DB::beginTransaction();

            /*
             * Create User Details
             */
            $created = User::create($user);

            /*
             * Assign User to a Role
             */

            if($created)
            {

               $insert_id = TeacherDetail::create([
                   'school_id' => $school_id,     
                   'user_id' => $created->id,
                   'highest_education_qualification' => $request->txt_diploma,    
                   'name_of_institution' => $request->txt_institution,    
                   'spoken_language' => $request->txt_lang,  
                   'country_of_incorporation' => $request->txt_residence,            
               ]);

            }

            $role = Role::findOrCreate('fulltime_teacher');

            User::find($created->id)->assignRole($role->name);
            $created->teacher()->attach($school);

            DB::commit();


            event(new Registered($created));
            $response['success'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on adding teacher.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
         
        $details = TeacherDetail::where('user_id' , $user->id)->first();
        $user->teacher_details = $details;

        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = $request->only(
            'first_name',
            'last_name',
        );

        if ($request->has('password') && !empty($request->input('password'))) {
            $user['password'] = Hash::make($request->password);
        }

        try {

            DB::beginTransaction();

              User::where('id', $id)
                ->update($user);


                      
            TeacherDetail::where('user_id' , $id)
            ->update([
            'highest_education_qualification' => $request->txt_diploma,    
            'name_of_institution' => $request->txt_institution,    
            'spoken_language' => $request->txt_lang,  
            'country_of_incorporation' => $request->txt_residence,            
            ]);



            DB::commit();
            $response['success'] = true;
            $response['updated'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on updating teacher.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            DB::beginTransaction();
            $user = User::find($id);
            $user->delete();

            DB::commit();
            $response['success'] = true;
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            $response['success'] = false;
            $response['message'] = "Error on deleting teacher.";
            $response['error'] = $exception->getMessage();
            return response()->json($response, 422);
        }

        return response()->json($response);
    }
}
