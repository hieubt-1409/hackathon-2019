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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['namespace' => 'Student', 'prefix' => 'student'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'sessions'], function() {
        Route::get('/', 'SessionController@index');
        Route::post('/', 'SessionController@store');
    });
});

Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher'], function () {
    Route::get('/', 'HomeController@index');
});
