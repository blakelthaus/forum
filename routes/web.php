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

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('threads', 'ThreadsController@index')->name('threads');
    Route::post('threads', 'ThreadsController@store')->name('saveThreads');
    Route::get('threads/create', 'ThreadsController@create')->name('createThread');
    Route::get('/threads/{channel}', 'ThreadsController@index')->name('channels');
    Route::get('/threads/{channel}/{thread}', 'ThreadsController@show')->name('showThread');

    Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store')->name('saveReply');

});


Auth::routes();


