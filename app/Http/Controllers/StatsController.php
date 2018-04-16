<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StatsController extends Controller 
{

public function index()
{
    return view('stats.index');
}

public function blok2()
{
    return view('stats.blok2');
}

public function blok3()
{
    return view('stats.blok3');
}

public function blok4()
{
    return view('stats.blok4');
}

}