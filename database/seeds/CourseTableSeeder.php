<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = Role::where('name', 'admin')->first();
    
    $admin = new User();
    $admin->firstname = 'Admin';
    $admin->lastname = 'Admin';
    $admin->email = 'Admin@Admin.com';
    $admin->password = bcrypt('123456');
    $admin->save();
    $admin->roles()->attach($role_admin);   
  }
}

