<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoApiController;
use App\Http\Controllers\ProductoApiController;

Route::get('/data', [ApiController::class, 'getData']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas con autenticación Sanctum
Route::middleware('auth:sanctum')->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Rutas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Productos
    Route::get('/productos', [ProductoApiController::class, 'index']);
    Route::get('/productos/{id}', [ProductoApiController::class, 'show']);
    Route::post('/productos', [ProductoApiController::class, 'store']);
    Route::put('/productos/{id}', [ProductoApiController::class, 'update']);
    Route::delete('/productos/{id}', [ProductoApiController::class, 'destroy']);

    // Pedidos
    Route::get('/pedidos', [PedidoApiController::class, 'index']);
    Route::get('/pedidos/{id}', [PedidoApiController::class, 'show']);
    Route::post('/pedidos', [PedidoApiController::class, 'store']);
    Route::put('/pedidos/{id}', [PedidoApiController::class, 'update']);
    Route::delete('/pedidos/{id}', [PedidoApiController::class, 'destroy']);
});
