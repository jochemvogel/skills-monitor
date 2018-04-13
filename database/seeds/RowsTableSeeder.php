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
        for($id = 1; $id <=10; $id++){
            $rubrics = Rubrics::findOrFail($id);
            factory(Rows::class, $rubrics->rows)->create(['rubrics_id' => $id]);
        }
    }
}
