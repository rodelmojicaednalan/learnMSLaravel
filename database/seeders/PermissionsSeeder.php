<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

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
}
