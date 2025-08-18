<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoWebController;
use App\Http\Controllers\AuthWebController;


Route::get('login', [AuthWebController::class, 'mostrarLogin'])->name('login');
Route::post('login', [AuthWebController::class, 'login']);
Route::get('registro', [AuthWebController::class, 'mostrarRegistro'])->name('registro');
Route::post('registro', [AuthWebController::class, 'registrar']);


Route::middleware(['auth'])->group(function () {
    Route::resource('proyectos', ProyectoWebController::class);
    Route::post('logout', [AuthWebController::class, 'logout'])->name('logout');
});