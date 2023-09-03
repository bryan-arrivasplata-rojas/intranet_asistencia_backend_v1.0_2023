<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Reports\AsistenciaDateController;
use App\Http\Controllers\Reports\AsistenciaUserController;
use App\Http\Middleware\CheckSessionTimeoutMiddleware;
use App\Http\Middleware\CheckRole;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware([CheckSessionTimeoutMiddleware::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Rutas de autenticación
    Route::post('/login', [LoginController::class, 'login'])->name('logger');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Route::get('/logout-auto', [LoginController::class, 'logoutAuto']);

    Route::resource('areas', AreaController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('assistances',AssistanceController::class)->middleware(CheckRole::class . ':admin,executive');
    Route::resource('departments',DepartmentController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('department_users',DepartmentUserController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('profiles',ProfileController::class)->middleware(CheckRole::class . ':admin')->except('edit','update');
    Route::resource('roles',RoleController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('services',ServiceController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('states',StateController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('times',TimeController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('types',TypeController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('users',UserController::class)->middleware(CheckRole::class . ':admin');
    Route::resource('reports_asistencia_date',AsistenciaDateController::class)->middleware(CheckRole::class . ':admin,executive');
    Route::resource('reports_asistencia_user',AsistenciaUserController::class);

    // Ruta personalizada para 'edit' sin middleware
    Route::get('profiles/{profile}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/{profile}', [ProfileController::class, 'update'])->name('profiles.update');

    Route::fallback(function () {
        return redirect()->route('home'); // Redirige a la página de inicio en caso de error
    });
});