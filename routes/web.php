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

    Route::resource('sessions', 'SessionController');
    Route::group(['prefix' => 'sessions'], function() {
        Route::group(['prefix' => '{session}'], function () {
            Route::post('/accept-bid', 'SessionController@sessionAcceptBid');
        });
    });
});

Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher'], function () {
    Route::get('/', 'HomeController@index');
});

Route::group(['namespace' => 'Session', 'prefix' => 'session'], function () {
    Route::group(['prefix' => '{sessionBid}'], function () {
        Route::get('/', 'ChatController@index');
    });
});
