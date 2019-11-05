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

Route::get('/', 'BlakeController@index');
Route::get('/contact', 'BlakeController@contact');
Route::get('/resume', 'BlakeController@resume');

Route::get('/tailwind', 'Tailwind@index');

Route::group(['prefix' => 'spatial'], function() {
    Route::get('/', 'HomeController@show')->name('home.show');
    Route::post('/', 'HomeController@submit')->name('home.submit');
});

Route::group(['prefix' => 'vgk'], function() {
    Route::get('/', 'KnightsController@index')->name('vgk.index');
});

Route::group(['prefix' => 'forum'], function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home',  function () {
        return view('welcome');
    });
    Route::get('threads', 'ThreadsController@index')->name('threads');

    Route::post('threads', 'ThreadsController@store')->name('saveThreads');
    Route::get('threads/create', 'ThreadsController@create')->name('createThread');
    Route::get('/threads/{channel}', 'ThreadsController@index')->name('channels');
    Route::get('/threads/{channel}/{thread}', 'ThreadsController@show')->name('showThread');
    Route::delete('/threads/{channel}/{thread}', 'ThreadsController@destroy')->name('deleteThread');

    Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store')->name('saveReply');

    Route::get('/cheat-sheet', 'CheatSheetController@index')->name('cheatSheet');
    Route::post('/cheat-sheet/compile', 'CheatSheetController@compile')->name('compile');

    Route::post('/replies/{reply}/favorites', 'FavoritesController@store')->name('favorite');

    Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');

    Route::group(['prefix' => 'ashlee'], function() {
        Route::get('/', 'AshleeCouponController@index')->name('coupons');
        Route::post('/{couponId}', 'AshleeCouponController@redeem')->name('redeemCoupon');
    });

    Auth::routes();

});





