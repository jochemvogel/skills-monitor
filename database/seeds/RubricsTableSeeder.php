<?php

use Illuminate\Database\Seeder;
use App\Rubrics;

class RubricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Rubrics::class, 10)->create();
    }
}
