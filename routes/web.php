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

Auth::routes();

//gallery
Route::get('/', 'Controller@home');
Route::get('home', 'Controller@home');
Route::get('latest', 'Controller@latest');

//upload
Route::get('upload', 'Controller@upload')->middleware('auth');
Route::post('upload', 'PhotoController@upload')->middleware('auth');
