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
use Auth;

Route::get('/', function () {
    $currentUser = Auth::user();

    return view('welcome', compact('currentUser'));
});

Auth::routes();

Route::group(['namespace' => 'Student', 'prefix' => 'student'], function () {
    Route::get('/', 'HomeController@index');

    Route::resource('sessions', 'SessionController');

    Route::group(['prefix' => 'sessions'], function() {
        Route::group(['prefix' => '{session}'], function () {
            Route::get('/offers', 'SessionController@getOffers');
            Route::post('/accept-bid', 'SessionController@sessionAcceptBid');
        });
    });
});

Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'sessions'], function() {
        Route::post('/{session}/offer', 'SessionController@offerLession');
        Route::post('/{session}/cancel-offer', 'SessionController@cancelOffer');
    });
});

Route::group(['namespace' => 'Session', 'prefix' => 'chat'], function () {
    Route::group(['prefix' => '{sessionBid}'], function () {
        Route::get('/', 'ChatController@index');
    });
});
