<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Contracts\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = User::create([
            'first_name' => 'Artbug',
            'last_name' => 'Admin',            
            'gender' => 'Male',            
            'contact_number' => '',            
            'email' => 'admin@we-ui.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
        ]);

        $user->assignRole('administrator');
    }
}
