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
Route::get('stats/blok2', 'StatsController@blok2')->name('stats.blok2');
Route::get('stats/blok3', 'StatsController@blok3')->name('stats.blok3');
Route::get('stats/blok4', 'StatsController@blok4')->name('stats.blok4');

Route::resource('users', 'usersController');
Route::resource('rubrics', 'rubricsController');
Route::resource('stats', 'StatsController');

