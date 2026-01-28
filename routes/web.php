<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [HomeController::class, 'index'])->name('site.home');

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

Route::get('/cadastro', [RegisterController::class, 'index'])->name('site.register');
Route::post('/cadastro', [RegisterController::class, 'store'])->name('auth.register');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

// Dashboard
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('site.dashboard');

    // Pistas
    Route::get('/dashboard/{track:slug}', [TrackController::class, 'show'])
        ->name('dashboard.track');

    // Criar setup
    Route::get('/dashboard/{track:slug}/setup/create', [SetupController::class, 'create'])
        ->name('setup.create');

    Route::post('/dashboard/{track:slug}/setup', [SetupController::class, 'store'])
        ->name('setup.store');

    // Ver setup (simples)
    Route::get('/dashboard/{track:slug}/setup/{setup}', [SetupController::class, 'show'])
        ->name('setup.show');
});
