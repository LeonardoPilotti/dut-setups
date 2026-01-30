<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('site.home');

// Auth 
Route::get('/login', [LoginController::class, 'index'])
    ->name('site.login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('auth.login');

Route::get('/cadastro', [RegisterController::class, 'index'])
    ->name('site.register');

Route::post('/cadastro', [RegisterController::class, 'store'])
    ->name('auth.register');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('auth.logout');

// Dashboard (somente usuários logados)

Route::middleware('auth')->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('site.dashboard');

    // Ver pista + setups (filtro por role acontece no controller)
    Route::get('/dashboard/{track:slug}', [TrackController::class, 'show'])
        ->name('dashboard.track');

    // Setups

    // Criar setup (somente admin / team — controle no controller ou middleware)
    Route::get('/dashboard/{track:slug}/setup/create', [SetupController::class, 'create'])
        ->name('setup.create');

    Route::post('/dashboard/{track:slug}/setup', [SetupController::class, 'store'])
        ->name('setup.store');

    // Ver setup
    Route::get('/dashboard/{track}/setup/{setup}', [SetupController::class, 'show'])
        ->name('dashboard.setup.show');

    // Editar setup
    Route::get('/dashboard/setup/{setup}/edit', [SetupController::class, 'edit'])
        ->name('setups.edit');

    Route::put('/dashboard/setup/{setup}', [SetupController::class, 'update'])
        ->name('setups.update');

    Route::delete('/dashboard/setup/{setup}', [SetupController::class, 'destroy'])
    ->name('setups.destroy');
});
