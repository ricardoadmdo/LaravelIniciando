<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

// Rutas protegidas para estudiantes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/{id}', [StudentController::class, 'show']);
    Route::post('/students', [StudentController::class, 'store']);
    Route::put('/students/{id}', [StudentController::class, 'update']);
    Route::patch('/students/{id}', [StudentController::class, 'updatePartial']);
    Route::delete('/students/{id}', [StudentController::class, 'delete']);
});
