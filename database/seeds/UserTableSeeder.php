<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
  public function run()
  {
  $name = ['admin', 'teacher', 'student', 'external', 'guest'];

    for($i=0; $i<5; $i++)
    User::create([
            "firstname" => $name[$i],
            "lastname" => $name[$i],
            "email" => $name[$i]."@".$name[$i].".com",
            "role_id" => $i+1,
            "password" => bcrypt("123456"),
        ]);
  }
}

