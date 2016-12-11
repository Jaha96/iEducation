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

Route::get('/', 'PassportController@index');
Route::get('jobs',['as'=>'jobs','uses'=>'PassportController@jobs']);




Route::get('go/login', ['as' => 'login', 'uses' => 'AuthController@index']);
Route::post('login', ['as' => 'login.post', 'uses' => 'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

Route::group([
    'prefix' => 'go',
    'as' => 'Go::',
    'middleware' => ['web', 'auth']
], function(){
    Route::get('/', 'GoController@index');

    Route::get('user/{slug}/', 'UserController@EntryPoint');
    Route::post('user/{slug}/{action}', 'UserController@EntryPoint');

    Route::get('listLessons', 'LessonController@showList');

    Route::get('content/{slug}/', 'ContentController@EntryPoint');
    Route::post('content/{slug}/{action}', 'ContentController@EntryPoint');

    Route::get('media/{slug}/', 'MediaController@EntryPoint');
    Route::post('media/{slug}/{action}', 'MediaController@EntryPoint');

    Route::get('settings', 'SystemController@settings');

    Route::get('system/{slug}/', 'SystemController@EntryPoint');
    Route::post('system/{slug}/{action}', 'SystemController@EntryPoint');

    Route::get('auto/{slug}/', 'AutopartController@EntryPoint');
    Route::post('auto/{slug}/{action}', 'AutopartController@EntryPoint');

    Route::get('search', 'FilterController@index');
    Route::post('filter', 'FilterController@filter');
});

