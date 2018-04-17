<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StatsController extends Controller 
{

public function index()
{
    return view('stats.index');
}

public function show($id)
{   
    if( 1 == $id) {
        return view('stats.index');
    } 
    elseif( 2 == $id) {
        return view('stats.blok2');
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