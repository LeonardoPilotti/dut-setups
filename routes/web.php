<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/', [HomeController::class, 'index'])
    ->name('site.home');


// Auth

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('auth.login');
    Route::post('/logout', 'logout')->name('auth.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/cadastro', 'index')->name('site.register');
    Route::post('/cadastro', 'store')->name('auth.register');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('/forgot-password', 'sendResetLinkEmail')->name('password.email');
});

Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('/reset-password', 'reset')->name('password.update');
});


// Dashboard

Route::middleware('auth')->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('site.dashboard');


// Pista

    Route::get('/dashboard/{track:slug}', [TrackController::class, 'show'])
        ->name('dashboard.track');


// Setups

    Route::prefix('/dashboard/{track:slug}/setup')
        ->group(function () {

            // Criar
            Route::get('/create', [SetupController::class, 'create'])
                ->name('setup.create');

            Route::post('/', [SetupController::class, 'store'])
                ->name('setup.store');

            // Ver
            Route::get('/{setup}', [SetupController::class, 'show'])
                ->name('dashboard.setup.show');

            // Editar
            Route::get('/{setup}/edit', [SetupController::class, 'edit'])
                ->name('setups.edit');

            Route::put('/{setup}', [SetupController::class, 'update'])
                ->name('setups.update');

            Route::delete('/{setup}', [SetupController::class, 'destroy'])
                ->name('setups.destroy');
        });


// Favoritos

    Route::post('/tracks/{track}/setups/{setup}/favorite',
        [FavoriteController::class, 'toggle']
    )->name('setups.favorite');
});


// Admin

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::get('/users', [AdminController::class, 'users'])
            ->name('users');

        Route::put('/users/{user}/role', [AdminController::class, 'updateRole'])
            ->name('users.role');

        Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])
            ->name('users.destroy');
    });
