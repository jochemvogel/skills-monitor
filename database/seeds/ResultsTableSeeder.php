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
    public function run()
    {
        $results1 = new Results();
        $results1->course = 'GRE1';
        $results1->blok = 1;
        $results1->grade = 7;
        $results1->ec = 5;
        $results1->save();

        $results2 = new Results();
        $results2->course = 'SAN1';
        $results2->blok = 1;
        $results2->grade = 6;
        $results2->ec = 5;
        $results2->save();
    }
}
