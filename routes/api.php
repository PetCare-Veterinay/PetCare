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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cliente', 'App\Http\Controllers\ClienteController@index');

//Route::get('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@index');
//Route::put('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@update');
//Route::post('/cliente', 'App\Http\Controllers\ClienteController@store');
Route::delete('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@destroy');



Route::get('/cita', 'App\Http\Controllers\CitaController@index');
