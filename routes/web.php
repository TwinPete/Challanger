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

// Route::get('/', 'PagesController@landing');
Route::get('/', 'PagesController@landing');

Route::get('/Test', function(){
    return "hello k";
});
Route::get('/profile2', 'PagesController@profile2');

Route::resource('posts', 'PostsController');
Route::resource('postComment', 'PostCommentController');

Route::resource('challanges', 'ChallangesController');
Route::get('/startChallange/{id}', 'ChallangesController@start');

Route::post('/createPost', 'PostsController@store');

Auth::routes();

Route::resource('/profile', 'ProfileController');



