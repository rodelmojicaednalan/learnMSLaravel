<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\mdCountry;
use App\Models\User;
use App\Models\School;
use App\Models\Curriculum;
use App\Models\CurriculumResources;
use App\Models\TeacherDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;

class SchoolController extends Controller
{
    public function __construct()
	{
	    $this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'School';
        $page_description = '';

        $countries = mdCountry::all();

        return view('backend.administrator.school.index', compact('page_title', 'countries'));
    }

    public function ajax($section, Request $request)
    {
    	switch ($section) {

            case 'add_new_school':
                  

                $get_id = $request->id;


                // $exist = User::where('email', $request->email)->first();
               
                $user_obj = User::where('id', $get_id)->first();
        

				$validator = \Validator::make($request->all(), [
                    'school_name' => 'required|unique:schools',
                    'password' => 'required',
                    'email' => 'required|unique:users',
                    'first_name' => 'required',
                    'last_name' => 'required',
					'website' => 'required',
				]);
				
				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                if(empty($user_obj)) 
                {
                    
                        $insert_user = User::create([
                            'email' => $request->email,
                            'first_name' => $request->first_name,
                            'last_name' =>  $request->last_name,
                            'gender' => "",
                            'is_approved' => 1,
                            'password' => Hash::make($request->password),
                        ]);

                        if($insert_user)
                        {

                            if ($request->hasFile('get_file')) {
                        

                                $image = $request->file('get_file');
                                $full_name = $image->getClientOriginalName();
                                $filename = pathinfo($full_name, PATHINFO_FILENAME);
                                $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                                $ranstr = sha1(time());
                                
                                $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();
    
                                $exists = Storage::disk('local')->has('uploads/school/profile/image/');
            
                                $filePath = 'uploads/school/profile/image/' . $new_name;
            
                                if (!$exists) {
                                    Storage::disk('public')->makeDirectory('uploads/school/profile/image/');
                                }
    
                                $delete_exist = Storage::disk('public')->has('uploads/school/profile/image/'.$request->old_img);
    
                                if($delete_exist)
                                {
                                    Storage::disk('public')->delete('uploads/school/profile/image/'.$request->old_img);
                                }
            
                                Storage::disk('public')->put($filePath, file_get_contents($image));
        
                            }
                            else {
                                $new_name = "";
                            }
                     
                    
                            $insert_id = School::create([
                                'school_name' => $request->school_name,
                                'description' => $request->description,
                                'company_registration_number' =>$request->crn,   
                                'website' =>$request->website,   
                                'address' =>$request->address,   
                                'logo' => $new_name,        
                                'user_id' => $insert_user->id,                
                            ]);

                        }
    
					return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
				}
           

            break;

            case 'add_new_teacher':

                    $user_obj = User::where('email', $request->email)->first();

              

                    if(empty($user_obj)) 
                    {

                        $validator = \Validator::make($request->all(), [
                            'password' => 'required',
                            'email' => 'required|unique:users',
                            'first_name' => 'required',
                            'last_name' => 'required',
                        ]);
                        
                        if ($validator->fails())
                        {
                            return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
                        }
                        
                            $insert_user = User::create([
                                'email' => $request->email,
                                'first_name' => $request->first_name,
                                'last_name' =>  $request->last_name,
                                'gender' => $request->gender,
                                'is_approved' => 1,
                                'password' => Hash::make($request->password),
                            ]);

                            
    
                            if($insert_user)
                            {

                                TeacherDetail::create([
                                    'user_id' => $insert_user->id,
                                    'school_id' => $request->school_id,
                                    'country_of_incorporation' => "",
                                    'highest_education_qualification' => $request->diploma,
                                    'spoken_language' => "",
                                    'name_of_institution' => $request->school,
                                    'profile_picture' => "",
                                ]);
    
                             
    
                            }
        
                        return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
                    }
                    else {

                        if($request->email == $request->old_email)
                        {
                            $validator = \Validator::make($request->all(), [
                                'email' => 'required',
                                'first_name' => 'required',
                                'last_name' => 'required',
                            ]);
                            
                            if ($validator->fails())
                            {
                                return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
                            }

                        }
                        else 
                        {
                            $validator = \Validator::make($request->all(), [
                                'email' => 'required|unique:users',
                                'first_name' => 'required',
                                'last_name' => 'required',
                            ]);
                            
                            if ($validator->fails())
                            {
                                return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
                            }

                        }


                        if($request->password != "")
                        {
                        $user_obj->password = Hash::make($request->password);
                        }

                        $user_obj->first_name = $request->first_name;
                        $user_obj->last_name = $request->last_name;
                        $user_obj->gender = $request->gender;

                        $user_obj->save();

                        $teacher_obj = TeacherDetail::where('user_id', $request->id)->first();

                        $teacher_obj->name_of_institution =  $request->school;
                        $teacher_obj->highest_education_qualification =  $request->diploma;

                        $teacher_obj->save();

                        return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
                    }


            break;

            case 'update_school_information':


                if($request->school == $request->name)
                {

                    $validator = \Validator::make($request->all(), [
                        'school_name' => 'required',
                        'website' => 'required',
                    ]);

                }
                else {
                    $validator = \Validator::make($request->all(), [
                        'school_name' => 'required|unique:schools',
                        'website' => 'required',
                    ]);

                }


				if ($validator->fails())
				{
					return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
				}

                $school_obj = School::where('id', $request->id)->first();
                       
                if ($request->hasFile('get_file')) {
                        

                    $image = $request->file('get_file');
                    $full_name = $image->getClientOriginalName();
                    $filename = pathinfo($full_name, PATHINFO_FILENAME);
                    $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                    $ranstr = sha1(time());
                    
                    $new_name = $filename.'_'. $ranstr. '.' . $image->getClientOriginalExtension();

                    $exists = Storage::disk('local')->has('uploads/school/profile/image/');

                    $filePath = 'uploads/school/profile/image/' . $new_name;

                    if (!$exists) {
                        Storage::disk('public')->makeDirectory('uploads/school/profile/image/');
                    }

                    $delete_exist = Storage::disk('public')->has('uploads/school/profile/image/'.$request->old_img);

                    if($delete_exist)
                    {
                        Storage::disk('public')->delete('uploads/school/profile/image/'.$request->old_img);
                    }

                    Storage::disk('public')->put($filePath, file_get_contents($image));

                }
                else {
                    $new_name = "";
                }

                $school_obj->description = $request->description;
                $school_obj->address = $request->address;
                $school_obj->company_registration_number = $request->crn;
                $school_obj->website = $request->website;
                $school_obj->school_name = $request->school_name;
                $school_obj->logo = $new_name;

                $school_obj->save();

                return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));

            break;

            case 'users-list':
                // $data = User::all();
         
                $data = DB::table('users')
                ->join('teacher_details', 'teacher_details.user_id', '=', 'users.id')
                ->select('users.first_name' , 'users.last_name', 'users.email' , 'users.id')
                ->where('teacher_details.school_id', $request->school_id);

                $get_all = DB::table('users')
                ->join('schools', 'schools.user_id', '=', 'users.id')
                ->select('users.first_name' , 'users.last_name', 'users.email' ,'users.id')
                ->where('schools.id', $request->school_id)
                ->union($data)->get();

     
                return json_encode($get_all);

    		break;

            case 'curriculum-list':
                $data = Curriculum::with('subject')->where('school_id' , $request->school_id)->get();

                return json_encode($data);
            break;

            case 'load_single_teacher':
                $user = User::where('id', $request->id)->first();
                $teacher = TeacherDetail::where('user_id', $request->id)->first();
                $data = array();
                $data['user'] = $user;
                $data['teacher'] = $teacher;

                return json_encode($data);
            break;    
 
            case 'list':
    				$data = School::with('user')->get();

    				return json_encode($data);
    		break;

            case 'resource-list':
                $data = CurriculumResources::where('curr_id' , $request->curr_id)->get();

                return json_encode($data);
            break;

				case 'load_single_school':
    				$data = School::where('id', $request->id)->first();

    				return json_encode($data);
    			break;

    		default:
    			
    			break;
    	}
    }
}
