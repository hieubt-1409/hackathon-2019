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
Auth::login(App\User::find(1));
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'sessions'], function() {
    Route::get('/', 'SessionController@index');
    Route::post('/', 'SessionController@store');
});
