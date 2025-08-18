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
    Route::post('/proyectos', [ProyectoController::class, 'store']);
    Route::put('/proyectos/{id}', [ProyectoController::class, 'update']);
    Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy']);
    Route::get('/proyectos', [ProyectoController::class, 'index']);
    Route::get('/proyectos/{id}', [ProyectoController::class, 'show']);
});