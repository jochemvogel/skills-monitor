<?php

use Illuminate\Database\Seeder;
use App\Results;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run() {
        factory(Results::class, 20)->create();
    }
}
