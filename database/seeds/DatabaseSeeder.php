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
        $this->call(ResultsTableSeeder::class);
        $this->call(CourseTableSeeder::class);
    }
}
