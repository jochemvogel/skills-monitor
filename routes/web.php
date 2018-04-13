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
Route::get('/profile', 'profileController@show')->name('profile');


Route::resource('users', 'usersController');
Route::resource('rubrics', 'rubricsController');
<<<<<<< HEAD
Route::resource('stats', 'StatsController');
=======

Route::post('/rubrics/create/part2', 'rubricsController@create2')->name('rubrics.create.part2');
>>>>>>> b152a958a02f5f8b66ce6efb7646667f5e34f300
