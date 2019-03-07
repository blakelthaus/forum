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
Route::group(['prefix' => 'forum'], function() {  
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index');
    Route::get('threads', 'ThreadsController@index');
    Route::post('threads', 'ThreadsController@store');
    Route::get('threads/create', 'ThreadsController@create');
    Route::get('/threads/{channel}', 'ThreadsController@index');
    Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');

    Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');

});


Auth::routes();


