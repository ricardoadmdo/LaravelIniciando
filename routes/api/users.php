<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rutas de usuarios
Route::post('/register', [UserController::class, 'register']);
