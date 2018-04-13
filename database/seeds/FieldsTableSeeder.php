<?php

use Illuminate\Database\Seeder;
use App\Rubrics;
use App\Field;
use App\Rows;

class FieldsTableSeeder extends Seeder
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
            $cols = $rubrics->cols;
            foreach (Rows::where('rubrics_id', '=', $id)->get() as $row) {
                for ($col=1;$col<=$cols;$col++){
                    factory(Field::class)->create(['rows_id' => $row->id, 'col' => $col]);
                }
            }
        }
    }
}
