<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\PasswordController;


Route::view('/', "index")->name('index');

Route::controller(InicioController::class)->group(function () {
    Route::get('inicio', 'index')->middleware('auth')->name('tareas.inicio');
    Route::get('crear-tarea', 'crear_tarea')->middleware('auth')->name('tareas.crear');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('auth.login');
    Route::post('login', 'login');
    Route::get('logout', 'logout')->middleware('auth')->name('auth.logout');
});

Route::controller(RegistroController::class)->group(function () {
    Route::get('registro', 'index')->name('auth.registro');
    Route::post('registro', 'registro');
});

Route::controller(PasswordController::class)->group(function () {
    Route::get('restablecer', 'form_restablecer')->name('auth.restablecer');
    Route::post('restablecer', 'send_restablecer');
    Route::get('password', 'goto_restablecer');
    Route::get('password-{token}', 'form_password')->name('auth.password');
    Route::post('password', 'cambiar_password');
});
