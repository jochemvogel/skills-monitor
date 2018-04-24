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
        $results2->course = 'SON1';
        $results2->blok = 1;
        $results2->grade = 8;
        $results2->ec = 5;
        $results2->save();

        $results3 = new Results();
        $results3->course = 'SBE1';
        $results3->blok = 1;
        $results3->grade = 7.5;
        $results3->ec = 5;
        $results3->save();
        
        $results4 = new Results();
        $results4->course = 'GRE2';
        $results4->blok = 2;
        $results4->grade = 6;
        $results4->ec = 5;
        $results4->save();
        
        $results5 = new Results();
        $results5->course = 'SON2';
        $results5->blok = 2;
        $results5->grade = 5;
        $results5->ec = 0;
        $results5->save();
        
        $results5 = new Results();
        $results5->course = 'SBE2';
        $results5->blok = 2;
        $results5->grade = 7;
        $results5->ec = 5;
        $results5->save();  
    }
}
