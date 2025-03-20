<?php

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\OficinaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SolicitudeController;
use App\Http\Controllers\AtencioneController;
use App\Http\Controllers\AnotacioneController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;

// Rutas de autenticación (login, logout)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rutas públicas adicionales (si las necesitas)
// ...

// Grupo de rutas protegidas con el middleware auth:funcionario y tu middleware check.user.type:1
//Route::middleware(['auth:funcionario', 'verifyuserrole:1'])->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard_u', function () {
        return view('dashboard_user');
    });

    // Rutas para los controladores de recursos
    Route::resource('personas', PersonaController::class);
    Route::resource('oficinas', OficinaController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('solicitudes', SolicitudeController::class);
    Route::resource('atenciones', AtencioneController::class);
    Route::resource('anotaciones', AnotacioneController::class);

    // Rutas manuales adicionales (solo si requieres rutas específicas o nombres personalizados)
    Route::get('persona/index', [PersonaController::class, 'index'])->name('persona.index');
    Route::get('persona/create', [PersonaController::class, 'create'])->name('persona.create');
    Route::get('persona/edit', [PersonaController::class, 'edit'])->name('persona.edit');
    Route::get('persona/show', [PersonaController::class, 'show'])->name('persona.show');

    Route::get('funcionario/index', [FuncionarioController::class, 'index'])->name('funcionario.index');
    Route::get('funcionario/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
    Route::get('funcionario/edit', [FuncionarioController::class, 'edit'])->name('funcionario.edit');
    Route::get('funcionario/show', [FuncionarioController::class, 'show'])->name('funcionario.show');

    Route::get('oficina/index', [OficinaController::class, 'index'])->name('oficina.index');
    Route::get('oficina/create', [OficinaController::class, 'create'])->name('oficina.create');
    Route::get('oficina/edit', [OficinaController::class, 'edit'])->name('oficina.edit');
    Route::get('oficina/show', [OficinaController::class, 'show'])->name('oficina.show');

    Route::get('role/index', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('role/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::get('role/show', [RoleController::class, 'show'])->name('role.show');

    // Rutas de solicitudes (algunas se repiten, revisa si necesitas ambas)
    Route::get('solicitude/index', [SolicitudeController::class, 'index'])->name('solicitude.index');
    Route::get('solicitude/create', [SolicitudeController::class, 'create'])->name('solicitude.create');
    Route::get('solicitudes/{id}/edit', [SolicitudeController::class, 'edit'])->name('solicitudes.edit');
    Route::get('solicitude/show', [SolicitudeController::class, 'show'])->name('solicitude.show');
    Route::put('solicitudes/{solicitude}', [SolicitudeController::class, 'update'])->name('solicitudes.update');
    Route::delete('solicitudes/{id}', [SolicitudeController::class, 'destroy'])->name('solicitudes.destroy');

    // Rutas de atenciones
    Route::get('atencione/index', [AtencioneController::class, 'index'])->name('atencione.index');
    Route::get('atencione/create', [AtencioneController::class, 'create'])->name('atencione.create');
    Route::get('atencione/edit', [AtencioneController::class, 'edit'])->name('atencione.edit');
    Route::get('atencione/show', [AtencioneController::class, 'show'])->name('atencione.show');

    // Rutas de anotaciones
    Route::get('anotacione/index', [AnotacioneController::class, 'index'])->name('anotacione.index');
    Route::get('anotacione/create', [AnotacioneController::class, 'create'])->name('anotacione.create');
    Route::get('anotacione/edit', [AnotacioneController::class, 'edit'])->name('anotacione.edit');
    Route::get('anotacione/show', [AnotacioneController::class, 'show'])->name('anotacione.show');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//});
