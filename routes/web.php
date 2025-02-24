<?php
/* controladores de las tablas */
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FuncionariosSoporteController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FuncionarioController;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('personas', PersonaController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('roles', RoleController::class);
Route::resource('funcionarios-soportes', FuncionariosSoporteController::class);
