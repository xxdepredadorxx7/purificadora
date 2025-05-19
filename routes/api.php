<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/data', [ApiController::class, 'getData']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas para gestión de usuarios
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);       // Listar todos
    Route::get('/{id}', [UserController::class, 'show']);    // Mostrar uno
    Route::put('/{id}', [UserController::class, 'update']);  // Actualizar
    Route::delete('/{id}', [UserController::class, 'destroy']); // Eliminar
}); Route::delete('/{id}', [UserController::class, 'destroy']); // Eliminar
