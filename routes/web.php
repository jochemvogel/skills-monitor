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
    Route::get('/courses/{id}/delete', 'coursesController@delete')->name('courses.delete');
    Route::get('/courses/{id}/addUser', 'coursesController@add')->name('courses.add');
    Route::get('/courses/{id}/remove', 'coursesController@remove')->name('courses.remove');
    Route::get('/courses/{course_id}/removeUser/{user_id}', 'coursesController@removeUser')->name('courses.removeUser');
    Route::get('/courses/{course_abbreviation}', 'coursesController@show');
    Route::get('/rubrics/{id}/delete', 'rubricsController@delete')->name('rubrics.delete');
    Route::post('/courses/{course_id}/removeUserConfirm/{user_id}', 'coursesController@destroyUser')->name('courses.destroyUser');
    Route::post('/courses/{id}/addUser/done', 'coursesController@addUser')->name('courses.addUser');


    Route::resource('users', 'usersController');
    Route::resource('rubrics', 'rubricsController');
    Route::resource('courses', 'coursesController');

    // JSONcontroller routes
    Route::put('updatefield', 'JSONcontroller@updateField');
    Route::put('backupfield', 'JSONcontroller@backupField');
    Route::get('moverow', 'JSONcontroller@moveRow');
    Route::get('getpending', 'JSONcontroller@getPending');
});

Route::fallback(function ()
{
    return Redirect::to('/');
});