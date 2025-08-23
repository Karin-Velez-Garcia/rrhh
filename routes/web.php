<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\EstadoCivilController;
use App\Http\Controllers\MotivoController;
use App\Http\Controllers\RenglonController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoPermisoController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\TipoAlertaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas del módulo Estados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('estados', EstadoController::class);
});

// Rutas del módulo Sexos
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('sexos', SexoController::class);
});

// Rutas del módulo Renglones
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('renglones', RenglonController::class);
});

// Rutas del módulo Tipos de Contrato
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tipos-contrato', TipoContratoController::class)->parameters([
        'tipos-contrato' => 'tipoContrato'
    ]);
});

// Rutas del módulo Tipos de Documento
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tipos-documento', TipoDocumentoController::class)->parameters([
        'tipos-documento' => 'tipoDocumento'
    ]);
});

// Rutas del módulo Tipos de Permiso
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tipos-permiso', TipoPermisoController::class)->parameters([
        'tipos-permiso' => 'tipoPermiso'
    ]);
});

// Rutas del módulo Prioridades
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('prioridades', PrioridadController::class)->parameters([
        'prioridades' => 'prioridad'
    ]);
});

// Rutas del módulo Tipos de Alerta
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tipos-alerta', TipoAlertaController::class)->parameters([
        'tipos-alerta' => 'tipoAlerta'
    ]);
});

// Rutas del módulo Estados Civiles
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('estados-civil', EstadoCivilController::class)->parameters([
        'estados-civil' => 'estadoCivil'
    ]);
});

// Rutas del módulo Motivos
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('motivos', MotivoController::class)->parameters([
        'motivos' => 'motivo'
    ]);
});

// Rutas del módulo Empleados
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('empleados', EmpleadoController::class)->parameters([
        'empleados' => 'empleado'
    ]);
});

require __DIR__.'/auth.php';
