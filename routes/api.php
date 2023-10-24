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

//productos
Route::get('/producto', 'App\Http\Controllers\ProductoController@index');
Route::get('/producto/{id}', 'App\Http\Controllers\ProductoController@show');
Route::put('/producto/{producto}', 'App\Http\Controllers\ProductoController@update');
Route::delete('/producto/{producto}', 'App\Http\Controllers\ProductoController@destroy');
Route::post('/producto', 'App\Http\Controllers\ProductoController@store');

//ventas
Route::get('/ventas', 'App\Http\Controllers\VentasController@index');
Route::get('/ventas/{id}', 'App\Http\Controllers\VentasController@show');
Route::put('/ventas/{ventas}', 'App\Http\Controllers\VentasController@update');
Route::delete('/ventas/{ventas}', 'App\Http\Controllers\VentasController@destroy');
Route::post('/ventas', 'App\Http\Controllers\VentasController@store');

