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

//SERVICIO
Route::get('/servicio', 'App\Http\Controllers\ServicioController@index');//listar
Route::get('/servicio/{id}', 'App\Http\Controllers\ServicioController@show');//consultar
Route::put('/servicio/{servicio}', 'App\Http\Controllers\ServicioController@update');//editar
Route::post('/servicio', 'App\Http\Controllers\ServicioController@store'); // Crear
Route::delete('/servicio/{servicio}', 'App\Http\Controllers\ServicioController@destroy');// eliminar

//PACIENTE
Route::get('/paciente', 'App\Http\Controllers\PacienteController@index');//listar
Route::get('/paciente/{id}', 'App\Http\Controllers\PacienteController@show');//consultar
Route::put('/paciente/{paciente}', 'App\Http\Controllers\PacienteController@update');//editar
Route::post('/paciente', 'App\Http\Controllers\PacienteController@store'); // Crear
Route::delete('/paciente/{paciente}', 'App\Http\Controllers\PacienteController@destroy');// eliminar

//TRATAMIENTO
Route::get('/tratamiento', 'App\Http\Controllers\TratamientoController@index');
Route::get('/tratamineto/{id}', 'App\Http\Controllers\TratamientoController@show');//consultar
Route::put('/tratamiento/{tratamiento}', 'App\Http\Controllers\TratamientoController@update');//editar
Route::post('/tratamiento', 'App\Http\Controllers\TratamientoController@store'); // Crear
Route::delete('/tratamiento/{tratamiento}', 'App\Http\Controllers\TratamientoController@destroy');// eliminar