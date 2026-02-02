<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('site.home');

// Auth
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('auth.login');

Route::get('/cadastro', [RegisterController::class, 'index'])
    ->name('site.register');

Route::post('/cadastro', [RegisterController::class, 'store'])
    ->name('auth.register');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('auth.logout');

// Redefinir senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');

// Dashboard (somente usuários logados)
Route::middleware('auth')->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('site.dashboard');

    // Ver pista + setups
    Route::get('/dashboard/{track:slug}', [TrackController::class, 'show'])
        ->name('dashboard.track');

    // Criar setup
    Route::get('/dashboard/{track:slug}/setup/create', [SetupController::class, 'create'])
        ->name('setup.create');

    Route::post('/dashboard/{track:slug}/setup', [SetupController::class, 'store'])
        ->name('setup.store');

    // Ver setup
    Route::get('/dashboard/{track:slug}/setup/{setup}', [SetupController::class, 'show'])
        ->name('dashboard.setup.show');

    // Editar setup
    Route::get('/dashboard/{track:slug}/setup/{setup}/edit', [SetupController::class, 'edit'])
        ->name('setups.edit');

    Route::put('/dashboard/{track:slug}/setup/{setup}', [SetupController::class, 'update'])
        ->name('setups.update');

    Route::delete('/dashboard/{track:slug}/setup/{setup}', [SetupController::class, 'destroy'])
        ->name('setups.destroy');
});

// Painel Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::put('/users/{user}/role', [AdminController::class, 'updateRole'])->name('users.role');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
});