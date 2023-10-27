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



//------RUTAS DE SERVICIOS-----
//listar
Route::get('/servicio-list', function () {
    return view('service.servicio');
})->name('lista');

//crear
Route::get('/crear-servicio', function () {
    return view('service.form');
})->name('Nuevo');

//enviar y guardar datos en la bd
Route::post('/service-save', function (Request $request) {
    $apiRequest = Request::create('/api/servicio', 'POST', $request->all());
    $response = app()->handle($apiRequest);
})->name('Guardado');

//Actualiar
Route::put('/servicio-updated/{id}', function (Request $request, $id) {
    $apiRequest = Request::create("/api/servicio/{$id}" , 'PUT', $request->all());
    $response = app()->handle($apiRequest);
})->name('seredit');

//Editar
Route::get('/2servicio/{id}', 'App\Http\Controllers\ServicioController@edit')
    ->name('Cambiar');

//------RUTAS DE DIAGNOSTICO-----
//Listar
Route::get('/diagnostico-list', function () {
    return view('diagnosis.diagnostico');
})->name('Dilistar');

//Crear
Route::get('/crear-diagnostico', function () {
    return view('diagnosis.form');
})->name('DiNuevo');

//enviar y guardar datos en la bd
Route::post('/diagnostico-save', function (Request $request) {
    $apiRequest = Request::create('/api/diagnostico', 'POST', $request->all());
    $response = app()->handle($apiRequest);
})->name('DiGuardado');

//Actualiar
Route::put('/diagnostico-updated/{id}', function (Request $request, $id) {
    $apiRequest = Request::create("/api/diagnostico/{$id}" , 'PUT', $request->all());
    $response = app()->handle($apiRequest);
})->name('Diedit');

//Editar
Route::get('/1diagnostico/{id}', 'App\Http\Controllers\DiagnosticoController@edit')
    ->name('CambiarDi');






//CLIENTE
//LISTAR
Route::get('/Cliente', function () {
    return view('Clientes.clientes');
})->name('Cliente');









//GUARDAR

Route::get('/CrearCliente', function () {
    return view('Clientes.form');
})->name('Client');

Route::post('/NuevoCliente', function (Request $request) {
    $apiRequest = Request::create('/api/cliente', 'POST', $request->all());
    $response = app()->handle($apiRequest);
})->name('vistaCliente');



//EDITAR
//RUTA PARA ACTUALIZAR
Route::put('/NewCliente/{id}', function (Request $request, $id) {
    $apiRequest = Request::create("/api/cliente/{$id}", 'PUT', $request->all());
    $response = app()->handle($apiRequest);
    return $response; // Devuelve la respuesta a la solicitud original
})->name('editando');


#RUTA PARA CARGAR EL FORMULARIO DE EDITAR 
Route::get('/EditarCliente/{id}', 'App\Http\Controllers\ClienteController@edit')
    ->name('modificado');






//PACIENTE
//LISTAR
Route::get('/Pacientes', function () {
    return view('Pacientes.Gpaciente');
})->name('Paciente.General');



//GUARDAR
Route::get('/CreatePacientes', function () {
    return view('Pacientes.form');
})->name('Up.Paciente');
                    
Route::post('/NuevoPaciente', function (Request $request) {
    $apiRequest = Request::create('/api/paciente', 'POST', $request->all());
    $response = app()->handle($apiRequest);
})->name('pacienteCreado');
                    
                    
                    
//EDITAR
//RUTA PARA ACTUALIZAR
Route::put('/NuevoPaciente/{id}', function (Request $request, $id) {
    $apiRequest = Request::create("/api/paciente/{$id}", 'PUT', $request->all());
    $response = app()->handle($apiRequest);
    return $response; // Devuelve la respuesta a la solicitud original
})->name('edit.Paciente');
                                   
                    
#RUTA PARA CARGAR EL FORMULARIO DE EDITAR 
Route::get('/PacienteEditado/{id}', 'App\Http\Controllers\PacienteController@edit')
->name('modi.Paciente');


