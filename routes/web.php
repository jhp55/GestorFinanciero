<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => auth()->check()
    ? redirect()->route('dashboard')
    : redirect()->route('login')
);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('categorias', CategoriaController::class)
        ->except('show');

    Route::resource('cuentas', CuentaController::class)
        ->except('show');

    Route::resource('transacciones', TransaccionController::class)
        ->except('show');

});

require __DIR__ . '/auth.php';