<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatsController extends Controller {

    public function index() {

        $results = DB::table('results')->where('blok', 1)->get();
        return view('stats.index', ['results'=>$results]);
    }

    public function getDataBlok(Request $request) {

        $results = DB::table('results')->where('blok', '=', $request->input("blok"))->get();
        return $results;
    }
}