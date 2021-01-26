<?php

use Illuminate\Support\Facades\Route;


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

Route::get('', 'hashtagController@index');

Route::get('hashtag', 'hashtagController@index'); 
Route::post('hashtag/search', 'hashtagController@store'); 
Route::get('hashtag/search', function() {
    return abort(403);
});
Route::get('hashtag_post', 'hashtagPostController@index'); 
Route::post('hashtag_post/search', 'hashtagPostController@store'); 
Route::get('hashtag_post/search', function() {
    return abort(403);
});


