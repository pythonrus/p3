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

Route::get('/ipsum','IpsumController@getIndex');
Route::post('/ipsum','IpsumController@postIndex');
Route::get('/usergen','UsergenController@getIndex');
Route::post('/usergen','UsergenController@postIndex');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

# Restrict certain routes to only be viewable in the local environments
if(App::environment('local')) {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
