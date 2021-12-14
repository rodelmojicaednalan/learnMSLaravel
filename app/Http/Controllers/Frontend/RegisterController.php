<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Auth;
use Spatie\Permission\Models\Role;
use App\Models\TeacherDetail;
use App\Models\User;
use App\Models\Child;
use App\Models\School;
use App\Models\ParentDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Carbon\Carbon;
use DB;

class RegisterController extends Controller
{

    public function ajax($section, Request $request)
    {
        // print_r($request->all());exit;
        switch ($section) {

            case 'reset_password':

                // print_r($request->all());exit;

                $get_token = DB::table('password_resets')->select('email', 'token', 'created_at', DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as expiration_date'))
                    ->where('token', $request->get_token)
                    ->get();


                $date_today = date('Y-m-d');



                if (sizeof($get_token) > 0) {

                    $expiration_date = $get_token[0]->expiration_date;

                    if ($date_today == $expiration_date) {


                        $user = User::where('email', $get_token[0]->email)
                            ->update([
                                'password' => Hash::make($request->password),
                            ]);

                        DB::table('password_resets')
                            ->where('password_resets.token',  $get_token[0]->token)
                            ->delete();

                        return Response::json(array('error' => false, 'message' => 'Password updated Successfully'));
                    }
                } else {
                    return Response::json(array('error' => true, 'message' => 'Password reset token expired'));
                }



                break;

            case 'forgot_request':

                $user = User::where('email',  $request->email)->get();
                // https://foodpanda.we-ui.com/forgot_password


                if (sizeof($user) > 0) {
                    $random = substr(md5(mt_rand()), 0, 20);
                    DB::table('password_resets')->insert([
                        'email' => $request->email,
                        'token' => $random,
                        'created_at' => Carbon::now()
                    ]);
                    $link = url('/?token=' . $random);
                    $message = "<p>Please click  <a href='" . $link . "'>here</a> to reset your password</p>";
                    Mail::to($request->email)->send(new WelcomeMail("Reset Password", $message));
                    return Response::json(array('error' => false, 'message' => ''));
                } else {
                    return Response::json(array('error' => true, 'message' => 'The email doesnt exist'));
                }

                break;

            case 'register_teacher':
                $exist = User::where('email', $request->email)->first();

                if ($exist) {
                    $link = url('/?forgot_pass&email=' . $request->email . '&token=0');
                    $message = "<p>The email is already registered before did you forgot your password click <a href='" . $link . "'>here</a> to reset your password?</p>";
                    Mail::to($request->email)->send(new WelcomeMail("Email exist", $message));
                    return Response::json(array('error' => false, 'message' => ''));
                }

                $validator = \Validator::make($request->all(), [
                    // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'gender' => 'required',
                    'password' =>  'required|string|confirmed',
                    'password_confirmation' =>  ['required', 'string',]
                ]);

                if ($validator->fails()) {
                    return Response::json(array('error' => true, 'errors' => $validator->errors()->all()));
                }

                $insert_user = User::create([
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'contact_number' => $request->contact_number,
                    'password' => Hash::make($request->password),
                    'is_approved' => 1,
                ]);


                $new_name = "";

                $image = $request->file('select_file');

                if ($request->hasFile('select_file')) {
                    $full_name = $image->getClientOriginalName();
                    $filename = pathinfo($full_name, PATHINFO_FILENAME);
                    $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                    $ranstr = sha1(time());

                    $new_name = $filename . '_' . $ranstr . '.' . $image->getClientOriginalExtension();

                    $exists = Storage::disk('public')->has('uploads/teacher/profile/image/');

                    $filePath = 'uploads/teacher/profile/image/' . $new_name;

                    if (!$exists) {
                        Storage::disk('public')->makeDirectory('uploads');
                    }

                    Storage::disk('public')->put($filePath, file_get_contents($image));
                }
                
                
                if ($insert_user) {
                    TeacherDetail::create([
                        'user_id' => $insert_user->id,
                        'country_of_incorporation' => $request->country_incorporation,
                        'highest_education_qualification' => $request->education,
                        'spoken_language' => $request->language,
                        'name_of_institution' => $request->institution_name,
                        'profile_picture' => $new_name,
                        'type' => "Freelance Teacher",
                        'description' => $request->description,
                    ]);

                    $role = Role::findOrCreate('teacher');

                    $insert_user->assignRole($role->name);

                    event(new Registered($insert_user));
                }





                return Response::json(array('error' => false, 'message' => 'Teacher Successfully Registered', 'errors' => $validator->errors()->all()));


                break;

            case 'register_learner':

                $exist = User::where('email', $request->email)->first();

                if ($exist) {
                    $link = url('/?forgot_pass&email=' . $request->email . '&token=0');
                    $message = "<p>The email is already registered before did you forgot your password click <a href='" . $link . "'>here</a> to reset your password?</p>";
                    Mail::to($request->email)->send(new WelcomeMail("Email exist", $message));
                    return Response::json(array('error' => false, 'message' => ''));
                }

                $validator = \Validator::make($request->all(), [
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' =>  'required|string|confirmed',
                    'password_confirmation' =>  ['required', 'string',]
                ]);

                if ($validator->fails()) {
                    return Response::json(array('error' => true, 'errors' => $validator->errors()->all()));
                }

                $insert_user = User::create([
                    'email' => $request->email,
                    'first_name' => $request->parent_firstname,
                    'last_name' => $request->parent_lastname,
                    'gender' => $request->gender,
                    'password' => Hash::make($request->password),
                    'is_approved' => 1,
                ]);


                $new_name = "";

                $image = $request->file('select_file');

                if ($request->hasFile('select_file')) {
                    $full_name = $image->getClientOriginalName();
                    $filename = pathinfo($full_name, PATHINFO_FILENAME);
                    $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                    $ranstr = sha1(time());

                    $new_name = $filename . '_' . $ranstr . '.' . $image->getClientOriginalExtension();

                    $exists = Storage::disk('public')->has('uploads/parent/profile/image/');

                    $filePath = 'uploads/parent/profile/image/' . $new_name;

                    if (!$exists) {
                        Storage::disk('public')->makeDirectory('uploads/parent/profile/image/');
                    }

                    Storage::disk('public')->put($filePath, file_get_contents($image));
                }

                if ($insert_user) {
                    $insert_parent = ParentDetail::create([
                        'user_id' => $insert_user->id,
                        'gender' => $request->parent_gender,
                        'country_of_incorporation' => $request->parent_country,
                        'spoken_language' => $request->parent_language,
                        'profile_picture' => $new_name,
                    ]);

                    if ($insert_parent) {
                        if ($request->child_fname != "") {
                            Child::create([
                                'parent_id' => $insert_user->id,
                                'full_name' => $request->child_fname,
                                'birthdate' => $request->child_bday,
                                'gender' => $request->child_gender,
                                'grade' => $request->child_grade,
                                'school' => $request->child_school,
                                'country_of_residency' => $request->child_country,
                                'spoken_language' => $request->child_language,
                            ]);
                        }
                    }

                    $role = Role::findOrCreate('parent');

                    $insert_user->assignRole($role->name);
                    event(new Registered($insert_user));
                }





                return Response::json(array('error' => false, 'message' => 'User Successfully Registered', 'errors' => $validator->errors()->all()));


                break;

            case 'register_school':

                $exist = User::where('email', $request->email)->first();

                if ($exist) {
                    $link = url('/?forgot_pass&email=' . $request->email . '&token=0');
                    $message = "<p>The email is already registered before did you forgot your password click <a href='" . $link . "'>here</a> to reset your password?</p>";
                    Mail::to($request->email)->send(new WelcomeMail("Email exist", $message));
                    return Response::json(array('error' => false, 'message' => ''));
                }

                $validator = \Validator::make($request->all(), [
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'school_name' => 'required',
                    'company_registration_number' => 'required',
                    'password' =>  'required|string|confirmed',
                    'password_confirmation' =>  ['required', 'string',]
                ]);

                if ($validator->fails()) {
                    return Response::json(array('error' => true, 'errors' => $validator->errors()->all()));
                }

                $insert_user = User::create([
                    'email' => $request->email,
                    'first_name' => "",
                    'last_name' => "",
                    'gender' => "",
                    'contact_number' => $request->contact_number,
                    'is_approved' => 1,
                    'password' => Hash::make($request->password),
                ]);

                $new_name = "";

                $image = $request->file('select_file');

                if ($request->hasFile('select_file')) {
                    $full_name = $image->getClientOriginalName();
                    $filename = pathinfo($full_name, PATHINFO_FILENAME);
                    $extension = pathinfo($full_name, PATHINFO_EXTENSION);
                    $ranstr = sha1(time());

                    $new_name = $filename . '_' . $ranstr . '.' . $image->getClientOriginalExtension();

                    $exists = Storage::disk('local')->has('uploads/school/profile/image/');

                    $filePath = 'uploads/school/profile/image/' . $new_name;

                    if (!$exists) {
                        Storage::disk('public')->makeDirectory('uploads/school/profile/image/');
                    }

                    Storage::disk('public')->put($filePath, file_get_contents($image));
                }

                if ($insert_user) {
                    School::create([
                        'user_id' => $insert_user->id,
                        'school_name' => $request->school_name,
                        'country_of_incorporation' => $request->country,
                        'company_registration_number' => $request->company_registration_number,
                        'website' => $request->website,
                        'address' => $request->address,
                        // 'contact_number' => $request->contact_number,
                        'description' => $request->description,
                        'spoken_language' => $request->language,
                        'number_of_teachers' => $request->no_of_teacher,
                        'logo' => $new_name,
                    ]);

                    $role = Role::findOrCreate('school_administrator');

                    $insert_user->assignRole($role->name);
                    event(new Registered($insert_user));
                }

                // $role = Role::findOrCreate('school_administrator');

                return Response::json(array('error' => false, 'message' => 'School Successfully Registered', 'errors' => $validator->errors()->all()));

                break;

            default:

                break;
        }
    }
}
