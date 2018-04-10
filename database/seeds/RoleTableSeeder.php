<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'admin role';
        $role_admin->save();
        
        $role_teacher = new Role();
        $role_teacher->name = 'teacher';
        $role_teacher->description = 'teacher role';
        $role_teacher->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'student role';
        $role_student->save();

        $role_external = new Role();
        $role_external->name = 'external';
        $role_external->description = 'external code reviewer role';
        $role_external->save();

        $role_guest = new Role();
        $role_guest->name = 'guest';
        $role_guest->description = 'guest role';
        $role_guest->save();
    }
}
