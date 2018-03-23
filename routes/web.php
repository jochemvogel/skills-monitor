<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', function(){return view('test');});
Route::post('/create', function(){return view('test');});
Route::get('/another', function(){return view('another');});
Route::get('/profile', 'profileController@show')->name('profile');

Route::resource('users', 'usersController');
