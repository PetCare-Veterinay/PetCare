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


//CLIENTES
Route::get('/cliente', 'App\Http\Controllers\ClienteController@index');

//Route::get('/cliente/{id}', 'App\Http\Controllers\ClienteController@show');
//Route::put('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@update');
//Route::post('/cliente', 'App\Http\Controllers\ClienteController@store');
//Route::delete('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@destroy');



//CITA
Route::get('/cita', 'App\Http\Controllers\CitaController@index');
//Route::put('/cita/{cita}', 'App\Http\Controllers\CitaController@update');
//Route::post('/cita', 'App\Http\Controllers\CitaController@store');
//Route::get('/cita/{cita}', 'App\Http\Controllers\CitaController@show');
//Route::delete('/cita/{cita}', 'App\Http\Controllers\CitaController@destroy');



//DETALLE VENTA
Route::get('/detalleV', 'App\Http\Controllers\DetalleVentaController@index');
//Route::put('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@update');
//Route::post('/detalleV', 'App\Http\Controllers\DetalleVentaController@store');
//Route::get('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@show');
//Route::delete('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@destroy');


//DIAGNOSTICO
Route::get('/diagnostico', 'App\Http\Controllers\DiagnosticoController@index');