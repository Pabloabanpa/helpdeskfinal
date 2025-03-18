<?php
/* controladores de las tablas */
use App\Http\Controllers\PersonaController; // Se agrega el controlador de Persona
use App\Http\Controllers\OficinaController; // Se agrega el controlador de Oficina
use App\Http\Controllers\RoleController; // Se agrega el controlador de Role
use App\Http\Controllers\SolicitudeController;  // Se agrega el controlador de Solicitudes
use App\Http\Controllers\AtencioneController; // Se agrega el controlador de Atenciones
use App\Http\Controllers\AnotacioneController; // Se agrega el controlador de Anotaciones
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FuncionarioController;



Route::get('login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('dashboard_user', function () {
    return view('dashboard_user');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// rutas a todos los controladores
Route::resource('personas', PersonaController::class);
Route::resource('oficinas', OficinaController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('roles', RoleController::class);
Route::resource('solicitudes', SolicitudeController::class);
Route::resource('atenciones', AtencioneController::class);
Route::resource('anotaciones', AnotacioneController::class);


// rutas para el controladores en vistas

//Rutas de persona
Route::get('persona/index', [PersonaController::class, 'index'])->name('persona.index');
Route::get('persona/create', [PersonaController::class, 'create'])->name('persona.create');
Route::get('persona/edit', [PersonaController::class, 'edit'])->name('persona.edit');
Route::get('persona/show', [PersonaController::class, 'show'])->name('persona.show');

//rutas de funcionario
Route::get('funcionario/index', [FuncionarioController::class, 'index'])->name('funcionario.index');
Route::get('funcionario/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
Route::get('funcionario/edit', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
Route::get('funcionario/show', [FuncionarioController::class, 'show'])->name('funcionario.show');

//Rutas de oficina
Route::get('oficina/index', [OficinaController::class, 'index'])->name('oficina.index');
Route::get('oficina/create', [OficinaController::class, 'create'])->name('oficina.create');
Route::get('oficina/edit', [OficinaController::class, 'edit'])->name('oficina.edit');
Route::get('oficina/show', [OficinaController::class, 'show'])->name('oficina.show');

//Rutas de roles
Route::get('role/index', [RoleController::class, 'index'])->name('role.index');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::get('role/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::get('role/show', [RoleController::class, 'show'])->name('role.show');

//Rutas de solicitudes
Route::get('solicitude/index', [SolicitudeController::class, 'index'])->name('solicitude.index');
Route::get('solicitude/create', [SolicitudeController::class, 'create'])->name('solicitude.create');
Route::get('solicitudes/{id}/edit', [SolicitudeController::class, 'edit'])->name('solicitudes.edit');
Route::get('solicitude/show', [SolicitudeController::class, 'show'])->name('solicitude.show');
Route::put('solicitudes/{solicitude}', [SolicitudeController::class, 'update'])->name('solicitudes.update');

// Rutas de solicitudes (CRUD)
Route::resource('solicitudes', SolicitudeController::class);

// Rutas manuales adicionales (si las necesitas)
Route::get('solicitudes/{id}/edit', [SolicitudeController::class, 'edit'])->name('solicitudes.edit');
Route::put('solicitudes/{id}', [SolicitudeController::class, 'update'])->name('solicitudes.update');
Route::delete('solicitudes/{id}', [SolicitudeController::class, 'destroy'])->name('solicitudes.destroy');



//Rutas de atenciones
Route::get('atencione/index', [AtencioneController::class, 'index'])->name('atencione.index');
Route::get('atencione/create', [AtencioneController::class, 'create'])->name('atencione.create');
Route::get('atencione/edit', [AtencioneController::class, 'edit'])->name('atencione.edit');
Route::get('atencione/show', [AtencioneController::class, 'show'])->name('atencione.show');

//Rutas de anotaciones
Route::get('anotacione/index', [AnotacioneController::class, 'index'])->name('anotacione.index');
Route::get('anotacione/create', [AnotacioneController::class, 'create'])->name('anotacione.create');
Route::get('anotacione/edit', [AnotacioneController::class, 'edit'])->name('anotacione.edit');
Route::get('anotacione/show', [AnotacioneController::class, 'show'])->name('anotacione.show');



