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


//USER
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::post('/users', 'App\Http\Controllers\UserController@store');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::put('/users/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy');



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
Route::get('/tratamiento/{id}', 'App\Http\Controllers\TratamientoController@show');//consultar
Route::put('/tratamiento/{tratamiento}', 'App\Http\Controllers\TratamientoController@update');//editar
Route::post('/tratamiento', 'App\Http\Controllers\TratamientoController@store'); // Crear
Route::delete('/tratamiento/{tratamiento}', 'App\Http\Controllers\TratamientoController@destroy');// eliminar


//CLIENTES
Route::get('/cliente', 'App\Http\Controllers\ClienteController@index');

Route::get('/cliente/{id}', 'App\Http\Controllers\ClienteController@show');
Route::put('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@update');
Route::post('/cliente', 'App\Http\Controllers\ClienteController@store');
Route::delete('/cliente/{cliente}', 'App\Http\Controllers\ClienteController@destroy');



//CITA
Route::get('/cita', 'App\Http\Controllers\CitaController@index');
Route::put('/cita/{cita}', 'App\Http\Controllers\CitaController@update');
Route::post('/cita', 'App\Http\Controllers\CitaController@store');
Route::get('/cita/{cita}', 'App\Http\Controllers\CitaController@show');
Route::delete('/cita/{cita}', 'App\Http\Controllers\CitaController@destroy');



//DETALLE VENTA
Route::get('/detalleV', 'App\Http\Controllers\DetalleVentaController@index');
Route::put('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@update');
Route::post('/detalleV', 'App\Http\Controllers\DetalleVentaController@store');
Route::get('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@show');
Route::delete('/detalleV/{detalle}', 'App\Http\Controllers\DetalleVentaController@destroy');

//DIAGNOSTICO
Route::get('/diagnostico', 'App\Http\Controllers\DiagnosticoController@index');
Route::put('/diagnostico/{diagnostico}', 'App\Http\Controllers\DiagnosticoController@update');
Route::post('/diagnostico', 'App\Http\Controllers\DiagnosticoController@store');
Route::get('/diagnostico/{diagnostico}', 'App\Http\Controllers\DiagnosticoController@show');
Route::delete('/diagnostico/{diagnostico}', 'App\Http\Controllers\DiagnosticoController@destroy');

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