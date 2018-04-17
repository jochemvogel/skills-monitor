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

Route::middleware(['auth'])->group( function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'profileController@show')->name('profile');
    Route::get('/inbox', 'InboxController@index')->name('index');
    Route::get('/courses/create', 'coursesController@create');
    Route::get('/courses/{course_abbreviation}', 'coursesController@show');

    Route::resource('users', 'usersController');
    Route::resource('rubrics', 'rubricsController');
    Route::resource('courses', 'coursesController');
});

Route::fallback(function ()
{
    return Redirect::to('/');
});