<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Results;
use DB;

class StatsController extends Controller {

    public function index() {
        $results = Results::with('course')->where('blok', 1)->get();
        return view('stats.index', ['results'=>$results]);
    }

    public function getDataBlok(Request $request) {
        $results =  Results::with('course')->where("blok","=",$request->input("blok"))->get();
        return $results;
    }
}