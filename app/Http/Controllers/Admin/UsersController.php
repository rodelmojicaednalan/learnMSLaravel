<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Response;
use App\Models\User;
use App\Models\TeacherLevel;
use Zoom;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;



class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','role:administrator']);
	}
    public function index()
    {
        $page_title = 'Users';
        $page_description = '';

		$roles = Role::where('name', '!=' , 'school_administrator')
		                ->where('name', '!=' , 'school_teacher')
                        ->orWhereNull('name')->get();

        return view('backend.administrator.users.index', compact('page_title', 'page_description'))->with('roles' , $roles);
    }

   public function ajax($section, Request $request)
    {
    	switch ($section) {
			case 'add_user':

				// print_r($request->all());exit;
				if (Auth::check()) {
				 if(Auth::user()->hasRole('administrator')){

						$fake_id = $request->fake_id;

						$user_obj = User::where('id', $fake_id)->first();

						// $validator = \Validator::make($request->all(), [
						// 	'firstname' => ['required', 'string', 'max:255'],
						// 	'lastname' => ['required', 'string', 'max:255'],
						// 	'email' => [
						// 		'required',
						// 		'string',
						// 		'email',
						// 		'max:255',
						// 		Rule::unique(User::class),
						// 	],
						// 	'password' => $this->passwordRules(),
						// ]);


						if(empty($user_obj))
						{
						$validator = \Validator::make($request->all(), [
							'firstname' => ['required', 'string', 'max:255'],
							'lastname' => ['required', 'string', 'max:255'],
							'email' => ['required', 'string', 'max:255', 'unique:users'],
							'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
							'password_confirmation' => 'required',
							'gender' => 'required',
							'contact_number' => 'required',
						]);

						if ($validator->fails())
						{
							return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
						}



						$insert_user = User::create([
							'first_name' => $request->firstname,
							'last_name' => $request->lastname,
							'email' => $request->email,
							'gender' => $request->gender,
							'contact_number' =>  $request->contact_number,
							'password' =>  Hash::make($request->password),
						]);

						if($insert_user)
						{

								$zoom_user = Zoom::user()->create([
								'first_name' => $request->firstname,
								'last_name' => $request->lastname,
								'email' => $request->email,
								'password' => $request->password
								]);

						}

						if($request->role == "teacher")
						{

							$teacher = TeacherLevel::create([
								'user_id' => $user->id,
								'level' => 0,
							]);

						}

						$insert_user->assignRole($request->role);





						return Response::json(array('error'=>false , 'message'=>'Data Successfully Added','errors'=>$validator->errors()->all()));
						}
						else
						{

						if($request->email == $request->last_email)
						{

							$validator = \Validator::make($request->all(), [
								'firstname' => ['required', 'string', 'max:255'],
								'lastname' => ['required', 'string', 'max:255'],
								'email' => ['required', 'string', 'max:255'],
								'gender' => 'required',
								'contact_number' => 'required',
								'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
								'password_confirmation' => 'required'
							]);


						}
						else {

							$validator = \Validator::make($request->all(), [
								'firstname' => ['required', 'string', 'max:255'],
								'lastname' => ['required', 'string', 'max:255'],
								'email' => ['required', 'string', 'max:255', 'unique:users'],
								'gender' => 'required',
								'contact_number' => 'required',
								'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
								'password_confirmation' => 'required'
							]);

						}


						if ($validator->fails())
						{
							return Response::json(array('error'=>true , 'errors'=>$validator->errors()->all()));
						}


						$user_obj->first_name = $request->firstname;
						$user_obj->last_name = $request->lastname;
						$user_obj->email = $request->email;
						$user_obj->gender = $request->gender;
						$user_obj->contact_number = $request->contact_number;
						$user_obj->password = Hash::make($request->password);


						$user_obj->roles()->detach();
						$user_obj->assignRole($request->role);

						$user_obj->save();

						return Response::json(array('error'=>false , 'message'=>'Data Successfully Updated','errors'=>$validator->errors()->all()));
						}

					}
				}
				else
				{
				return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}

                break;

				case 'users-list':
				if (Auth::check()) {
					if(Auth::user()->hasRole('administrator')){

						// print_r($request->all());
                            // echo


						$query = User::query();

						// $data = DB::table('users')->with('roles')->
						// ->select('users.id','users.first_name','users.last_name','users.email','users.gender','users.contact_number','users.created_at');


						// $get_query = $request->get('query');

						// $get_sort = $request->get('sort');

						$search = $request->all();



						if(isset($search['query']['role']))
						{
							$query = $query->role($search['query']['role']);
						}

						if(isset($search['query']['gender']))
						{
							$query = $query->where('gender', $search['query']['gender']);
						}


						if(isset($search['sort']['field']))
						{
							$query=$query->orderBy($search['sort']['field'] , $search['sort']['sort']);
						}
						//sort


						if(isset($search['query']['generalSearch']))
						{

							$query->where(function ($query) use ($search) {
							$query->where('first_name', 'LIKE',"%{$search['query']['generalSearch']}%")
							->orWhere('last_name', 'LIKE',"%{$search['query']['generalSearch']}%")
							->orWhere('email', 'LIKE',"%{$search['query']['generalSearch']}%")
							->orWhere('contact_number', 'LIKE',"%{$search['query']['generalSearch']}%")
							->orWhere('gender', 'LIKE',"%{$search['query']['generalSearch']}%");
							});

						}



						$data = $query->get();



						for($x=0; $x < sizeof($data); $x++)
						{

							$get_user = User::where('id' , $data[$x]->id)->first();


							$roles = $get_user->getRoleNames();
							$data[$x]->roles = $roles;

						}
						return json_encode($data);
					}
				}
				else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
				break;

				case 'load_single_user':
				if (Auth::check()) {
					if(Auth::user()->hasRole('administrator')){
						$data = User::where('id', $request->id)->first();

						$roles = $data->getRoleNames();

						$data->roles = $roles;

						return json_encode($data);
					}
				}else
				{
					return Response::json(array('error'=>true , 'message'=>'','errors'=>['Invalid session']));
				}
				break;


    		default:

    			break;
    	}
    }
}
