<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {
    Route::post('register', 'AuthapiController@register');
    Route::post('login', 'AuthapiController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('me', 'AuthapiController@get_user_details');
    });
});