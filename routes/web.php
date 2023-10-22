<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PasswordController;


Route::view('/', "index")->name('index');

Route::controller(InicioController::class)->group(function () {
    Route::get('inicio', 'index')->middleware('auth:sanctum')->name('inicio');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'login');
    Route::get('logout', 'logout')->middleware('auth:sanctum')->name('logout');
});

Route::controller(RegistroController::class)->group(function () {
    Route::get('registro', 'index')->name('registro');
    Route::post('registro', 'registro');
});

Route::controller(PasswordController::class)->group(function () {
    Route::get('restablecer', 'formRestablecer')->name('restablecer');
    Route::post('restablecer', 'sendRestablecer');
    Route::get('password', 'gotoRestablecer');
    Route::get('password-{token}', 'formPassword')->name('password');
    Route::post('password', 'cambiarPassword');
});
