<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosClientesController;
use App\Http\Controllers\PedidosClientesController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminClientesController;
use App\Http\Controllers\Admin\AdminProductosController;
use App\Http\Controllers\Admin\AdminInventarioController;
use App\Http\Middleware\AdminMiddleware;

// Rutas de autenticación
Auth::routes();

// Ruta de inicio público
Route::get('/', function () {
    return Auth::check() ? redirect('/home') : view('welcome');
});

// Rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/productos', [ProductosClientesController::class, 'index'])->name('productos.index');
    Route::get('/pedidos', [PedidosClientesController::class, 'index'])->name('pedidos.index');
});

// Rutas de administración
Route::middleware([AdminMiddleware::class])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('index');
    Route::resource('clientes', AdminClientesController::class)->only(['index']);
    Route::resource('productos', AdminProductosController::class)->only(['index']);
    Route::get('/pedidos', [AdminProductosController::class, 'index'])->name('pedidos.index');
    Route::get('/inventario', [AdminInventarioController::class, 'index'])->name('inventario.index');
});
