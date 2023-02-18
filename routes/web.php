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

/* Route::get('/', function () {
    return view('input');
}); */
Route::get('/', "App\Http\Controllers\TaskController@index");
Route::post('/store', "App\Http\Controllers\TaskController@store");
Route::get('/show/{id}', "App\Http\Controllers\TaskController@show");
Route::get('/delete/{id}', "App\Http\Controllers\TaskController@destroy");
Route::get('/edit', "App\Http\Controllers\TaskController@edit");
Route::post('/edit/{id}', "App\Http\Controllers\TaskController@update");