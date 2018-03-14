<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class rubricsController extends Controller
{
    public static function checkName($name){
        if(DB::table('rubrics')->where('name', $name)->exists()){
            return DB::table('rubrics')->where('name', $name)->first()->id;
        }else{
            return NULL;
        }


    }

    public static function create($name, $cols, $rows){
        DB::table('rubrics')->insert([
            ['id' => NULL, 'name' => $name, 'cols' => $cols, 'rows' => $rows]
        ]);
        return DB::table('rubrics')->where('name', $name)->first()->id;
    }
}
