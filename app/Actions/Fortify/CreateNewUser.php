<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\TeacherLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        // print_r($input);
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],            
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();


        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'gender' => '',
            'contact_number' => '',
            'password' => Hash::make($input['password']),
        ]);

        if($input['type']==2)
        {
            $user->assignRole('teacher');

            
            $teacher = TeacherLevel::create([
                'user_id' => $user->id,
                'level' => 0,                
            ]);

        }else
        {
            $user->assignRole('parent');
        }
        

        return $user;
    }
}
