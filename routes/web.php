<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


#RUTA PARA LISTAR A TODOS LOS USUARIOS
Route::get('/users-list', function () {
    return view('users.user');
})->name('list');

#RUTA PARA CARGAR EL FORMULARIO DE CREAR
Route::get('/users-create', function () {
    return view('users.form');
})->name('create');


#TUTA PARA ENVIAR LOS DATOS Y GUARDARLOS EN LA BD
Route::post('/users-save', function (Request $request) {
    $apiRequest = Request::create('/api/users', 'POST', $request->all());
    $response = app()->handle($apiRequest);
})->name('save');


#RUTA PARA ACTUALIZAR LOS DATOS 
Route::put('/users-updated/{id}', function (Request $request, $id) {
    $apiRequest = Request::create("/api/users/{$id}", 'PUT', $request->all());
    $response = app()->handle($apiRequest);
})->name('edit');


#RUTA PARA CARGAR EL FORMULARIO DE EDITAR 
Route::get('/users-update/{id}', 'App\Http\Controllers\UserController@edit')
    ->name('update');


#RUTAS PARA VER,CREAR Y ELIMINAR DATOS DEL CALENDARIO HOME
Route::get('/getevent', 'App\Http\Controllers\FullCalendarController@getEvent')->name('getevent');
Route::post('/createevent','App\Http\Controllers\FullCalendarController@createEvent')->name('createevent');
Route::post('/deleteevent','App\Http\Controllers\FullCalendarController@deleteEvent')->name('deleteevent');
