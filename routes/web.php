<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;   

Route::get('/',[HomeController::class,'index'])
    ->name('site.home');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')
        ->name('site.login');
    Route::post('/login',[LoginController::class,'authenticate'])
        ->name('auth.login');
});
