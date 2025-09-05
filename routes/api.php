<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProyectoController;
use App\Http\Controllers\Api\AuthController;

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/registrar', [AuthController::class, 'registrar']);
});


Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('proyectos', ProyectoController::class);

});