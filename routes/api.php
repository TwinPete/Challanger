<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Posts

Route::get('posts', 'PostsController@index');

Route::get('post/{id}', 'PostsController@show');

Route::post('post', 'PostsController@store');

Route::put('post', 'PostsController@store');

Route::delete('post', 'PostsController@destroy');



// Challanges

Route::get('challanges', 'ChallangesController@index');

Route::get('challange/{id}', 'ChallangesController@show');

Route::post('challange', 'ChallangesController@store');

Route::put('challange', 'ChallangesController@store');

Route::delete('challange', 'ChallangesController@destroy');

Route::post('fileTemp', 'PagesController@fileTemp');
