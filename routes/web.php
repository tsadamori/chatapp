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

// Message Controller
Route::get('/', 'App\Http\Controllers\MessageController@index');
Route::get('ajax/getMessages', 'App\Http\Controllers\MessageController@getMessages');
Route::post('ajax/postMessage', 'App\Http\Controllers\MessageController@postMessage');
Route::get('ajax/getNickname', 'App\Http\Controllers\MessageController@getNickname');

// User Controller
Route::get('nickname', 'App\Http\Controllers\UserController@nickname');
Route::post('update_nickname', 'App\Http\Controllers\UserController@update_nickname');
