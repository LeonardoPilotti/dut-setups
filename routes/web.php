<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('site.dashboard')->middleware('auth');
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('site.login');
    Route::post('/login', [LoginController::class,'authenticate'])->name('auth.login');
    Route::post('/cadastro', [RegisterController::class,'register'])->name('auth.register');
    Route::get('/cadastro',[RegisterController::class, 'index'])->name('site.register');});
