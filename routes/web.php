<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PasswordController;


Route::view('/', "index")->name('index');

Route::controller(InicioController::class)->group(function () {
    Route::get('gtareas-inicio', 'index')->middleware('auth:sanctum')->name('gtareas-inicio');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('gtareas-login', 'index')->name('gtareas-login');
    Route::post('gtareas-login', 'login');
    Route::get('gtareas-logout', 'logout')->name('gtareas-logout');
});

Route::controller(RegistroController::class)->group(function () {
    Route::get('gtareas-registro', 'index')->name('gtareas-registro');
    Route::post('gtareas-registro', 'registro');
});

Route::controller(PasswordController::class)->group(function () {
    Route::get('gtareas-restablecer', 'restablecer')->name('gtareas-restablecer');
    Route::post('gtareas-restablecer', 'enviar');
//    Route::get('gtareas-codigo', 'codigo')->middleware('auth:sanctum')->name('gtareas-codigo');
    Route::get('gtareas-codigo', 'codigo')->name('gtareas-codigo');
    Route::post('gtareas-codigo', 'confirmar');
//    Route::get('gtareas-contrasena', 'contrasena')->middleware('auth:sanctum')->name('gtareas-contrasena');
    Route::get('gtareas-contrasena', 'contrasena')->name('gtareas-contrasena');
    Route::post('gtareas-contrasena', 'cambiar');
});
