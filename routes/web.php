<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['register => false']);

Route::get('/profile', 'User\ProfileController@index')->name('profile');

Route::group(['middleware' => ['auth','isAdmin']], function() {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

     Route::get('registered-user','Admin\RegisteredController@index');

     Route::get('user-edit/{id}','Admin\RegisteredController@edit');
     Route::put('user-update/{id}','Admin\RegisteredController@update');
     Route::get('user-delete/{id}','Admin\RegisteredController@destroy');
     Route::get('user-create','Admin\RegisteredController@create');
     Route::post('user-create-add','Admin\RegisteredController@store');
     Route::get('user-uploads/{id}','Admin\RegisteredController@view');
     Route::get('post-delete/{id}','Admin\RegisteredController@postdestroy');
});



