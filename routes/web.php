<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoWebController;
use App\Http\Controllers\AuthWebController;

Route::middleware(['auth'])->group(function () {
    Route::resource('proyectos', ProyectoWebController::class);
});
Route::middleware(['guest'])->group(function () {
    Route::get('register', [AuthWebController::class, 'mostrarRegistro'])->name('register');
    Route::post('register', [AuthWebController::class, 'registrar']);
    Route::get('login', [AuthWebController::class, 'mostrarLogin'])->name('login');
    Route::post('login', [AuthWebController::class, 'login']);
    Route::post('logout', [AuthWebController::class, 'logout'])->name('logout');
});




