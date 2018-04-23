<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatsController extends Controller 
{

public function index(){
    $results1 = DB::table('results')->where('blok', 1)->get();
    return view('stats.index', ['results1'=>$results1]);
}

public function show($id){
    
    $results2 = DB::table('results')->where('blok', 2)->get();

    if( 1 == $id) {
        return view('stats.index');
    } 
    elseif( 2 == $id) {
        return view('stats.blok2', ['results2'=>$results2]);
    }
    elseif( 3 == $id) {
        return view('stats.blok3');
    }
    elseif( 4 == $id) {
        return view('stats.blok4');
    }
    else{
        return view('errors.404');
    }

}

}