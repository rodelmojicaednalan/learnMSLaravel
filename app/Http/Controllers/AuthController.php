<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AuthController extends Controller
{
    
    public function roles_permissions()
    {        
        $admin_role = Role::create(['name' => 'administrator']);
        $teacher_role = Role::create(['name' => 'teacher']);
        $trainer_role = Role::create(['name' => 'trainer']);
        $parent_role = Role::create(['name' => 'parent']);

        // $admin_role = Role::findByName('administrator');
        // print_r($admin_role);
        $user_permission[] = Permission::create(['name' => 'access user list']);
        $user_permission[] = Permission::create(['name' => 'create user']);
        $user_permission[] = Permission::create(['name' => 'edit user']);
        $user_permission[] = Permission::create(['name' => 'delete user']);
     
        $curriculum_permission[] = Permission::create(['name' => 'access curriculum list']);
        $curriculum_permission[] = Permission::create(['name' => 'create curriculum']);
        $curriculum_permission[] = Permission::create(['name' => 'edit curriculum']);
        $curriculum_permission[] = Permission::create(['name' => 'delete curriculum']);              

        $admin_role->givePermissionTo($user_permission);
        $admin_role->givePermissionTo($curriculum_permission);


    }

    // public function register()
    // {
        
    //     return view('auth.user-login');
    // }

   // public function ajax($section, Request $request)
   //  {
   //  	switch ($section) {
   //  		case 'users-list':
   //  				// $users = User::where('active',1)->get()

   //  				$arr[] = ['userId'=>1, 'firstName'=>'James', 'lastName'=>'Tan','role'=>1,'email'=>'test1@yahoo.com','contactNumber'=>'9123123','gender'=>'Male','dateJoined'=>'2021-04-01'];
   //  				$arr[] = ['userId'=>1, 'firstName'=>'Johnny', 'lastName'=>'Lee','role'=>2,'email'=>'test2@yahoo.com','contactNumber'=>'9123123','gender'=>'Male','dateJoined'=>'2021-04-01'];
   //  				$arr[] = ['userId'=>1, 'firstName'=>'Clara', 'lastName'=>'Chow','role'=>3,'email'=>'test3@yahoo.com','contactNumber'=>'9123123','gender'=>'Male','dateJoined'=>'2021-04-01'];
   //  				$arr[] = ['userId'=>1, 'firstName'=>'Karen', 'lastName'=>'Lim','role'=>3,'email'=>'test4@yahoo.com','contactNumber'=>'9123123','gender'=>'Male','dateJoined'=>'2021-04-01'];

   //  				// echo 'test';

   //  				return json_encode($arr);
   //  			break;    		
    		
   //  		default:
    			
   //  			break;
   //  	}
   //  }
}
