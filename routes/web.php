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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', 'ProfileController');
Route::get('profile/form', 'ProfileController@form')->name('profile.form');
Route::post('profile/upload', 'ProfileController@upload')->name('profile.upload');
