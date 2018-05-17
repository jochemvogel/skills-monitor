<?php

namespace App\Http\Controllers;

use App\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rows;

class JSONcontroller extends Controller
{
    public function getPendingNames(Request $request){
        // #TODO make function
    }

    public function updateName(Request $request){
        // #TODO make function
    }

    public function backupName(Request $request){
        // #TODO make function
    }

    public function getPendingFields(Request $request){
        $hasPending = DB::table('pending_field_changes')->where('field_id', '=', $request->input('id'))->first()->content;
        DB::table('pending_field_changes')->where('field_id', '=', $request->input('id'))->delete();
        return $hasPending;
    }

    public function updateField(Request $request){
        DB::table('fields')->where('id', '=', $request->input('id'))->update([
            'content' => $request->input('content'),
        ]);
    }

    public function backupField(Request $request){
        DB::table("pending_field_changes")->insert([
            "content" => $request->input('content'),
            "field_id" => $request->input('id'),
        ]);
    }

    public function moveRow(Request $request){
        $rubrics_id = DB::table('rows')->where('id', "=", $request->input('id'))->pluck('rubrics_id')->first();
        $currentRowOrder = DB::table('rows')->where('id', "=", $request->input('id'))->pluck('order')->first();

        if($request->input('move') == "up"){
            DB::table('rows')->where('order', '=', $currentRowOrder-1)->where('rubrics_id', '=', $rubrics_id)->update(["order" => $currentRowOrder]);
            DB::table('rows')->where('id', '=', $request->input('id'))->update(["order" => $currentRowOrder-1]);
        }elseif($request->input('move') == "down"){
            DB::table('rows')->where('order', '=', $currentRowOrder + 1)->where('rubrics_id', '=', $rubrics_id)->update(["order" => $currentRowOrder]);
            DB::table('rows')->where('id', '=', $request->input('id'))->update(["order" => $currentRowOrder + 1]);
        }
        return $rubrics_id;
    }

    public function deleteRow(Request $request){
        $rubrics_id = DB::table('rows')->where('id', '=', $request->input('id'))->pluck('rubrics_id');
        DB::table('fields')->where('row_id', '=', $request->input('id'));
        DB::table('rows')->delete($request->input('id'));

        return $rubrics_id;
    }

    public function addRow(Request $request){
        $cols = DB::table('rubrics')->where('id', '=', $request->input('id'))->pluck('cols')->first();
        $order = DB::table('rows')->where('rubrics_id', '=', $request->input('id'))->count();
        $rowid = Rows::create(['rubrics_id' => $request->input('id'), 'order' => $order])->id;
//        $i = 1;
//        dd($cols);
        for($i = 1; $i<=$cols; $i++){
            Field::create(['col' => $i, 'content' => '', 'rows_id' => $rowid]);
        }
        return $request->input('id');
    }
}
