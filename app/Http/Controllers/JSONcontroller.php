<?php

namespace App\Http\Controllers;

use App\Role;
use App\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class JSONcontroller extends Controller
{
    public function updateField(Request $request){
        DB::table('fields')->where('id', '=', $request->input('id'))->update([
            'content' => $request->input('content'),
        ]);
    }

    public function backupField(Request $request){
        DB::table("pending_changes")->insert([
            "content" => $request->input('content'),
            "field_id" => $request->input('id'),
        ]);
    }

    public function getPending(Request $request){
        $hasPending = DB::table('pending_changes')->where('field_id', '=', $request->input('id'))->first()->content;
        DB::table('pending_changes')->where('field_id', '=', $request->input('id'))->delete();
        return $hasPending;
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
}
