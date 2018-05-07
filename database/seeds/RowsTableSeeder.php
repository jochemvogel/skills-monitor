<?php

use Illuminate\Database\Seeder;
use App\Rubrics;
use App\Rows;

class RowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<31; $i++){
            $rubricsid = rand(1,10);
            factory(Rows::class)->create(['rubrics_id' => $rubricsid, 'order' => Rows::all()->where('rubrics_id', '=', $rubricsid)->count()]);
        }
    }
}
