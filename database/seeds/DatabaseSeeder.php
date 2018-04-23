<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RubricsTableSeeder::class);
        $this->call(RowsTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
<<<<<<< HEAD
        $this->call(ResultsTableSeeder::class);
=======
        $this->call(CourseTableSeeder::class);
>>>>>>> b4ce17389e4f224e5d3845601b9710772e23b460
    }
}
