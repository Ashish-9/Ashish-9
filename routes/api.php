<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

//user
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout')->middleware('jwtAuth');
Route::post('save_user_info','Api\AuthController@saveUserInfo')->middleware('jwtAuth');

//post
Route::post('posts/create','Api\PostsController@create')->middleware('jwtAuth');
// Route::post('posts/delete','Api\PostsController@delete')
// Route::post('posts/update','Api\PostsController@update')->middleware('jwtAuth');
// Route::get('posts','Api\PostsController@posts')->middleware('jwtAuth');
 Route::get('posts/myposts','Api\PostsController@myposts')->middleware('jwtAuth');
 Route::get('posts/my_posts','Api\PostsController@my_posts');
 Route::post('change-password', 'Api\AuthController@change_password');
