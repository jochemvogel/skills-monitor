<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
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

