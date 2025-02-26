<?php
/* controladores de las tablas */
use App\Http\Controllers\PersonaController; // Se agrega el controlador de Persona
use App\Http\Controllers\OficinaController; // Se agrega el controlador de Oficina
use App\Http\Controllers\RoleController; // Se agrega el controlador de Role
use App\Http\Controllers\FuncionariosSoporteController; // Se agrega el controlador de FuncionariosSoporte
use App\Http\Controllers\SolicitudeController;  // Se agrega el controlador de Solicitudes
use App\Http\Controllers\AtencioneController; // Se agrega el controlador de Atenciones
use App\Http\Controllers\AnotacioneController; // Se agrega el controlador de Anotaciones   
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FuncionarioController;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// rutas a todos los controladores
Route::resource('personas', PersonaController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('roles', RoleController::class);
Route::resource('funcionarios-soportes', FuncionariosSoporteController::class);
Route::resource('solicitudes', SolicitudeController::class);
Route::resource('atenciones', AtencioneController::class);
Route::resource('anotaciones', AnotacioneController::class);
