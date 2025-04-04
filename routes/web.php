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
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SoporteController;

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
    Route::prefix('perfil')->name('perfil.')->group(function () {
        Route::get('/', [PerfilController::class, 'index'])->name('index');
        Route::get('/editar', [PerfilController::class, 'edit'])->name('edit');
        Route::put('/', [PerfilController::class, 'update'])->name('update');
    });
    Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte.index');
});

// Rutas de administración
Route::middleware([AdminMiddleware::class])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('index');
    Route::resource('clientes', AdminClientesController::class)->except(['create', 'store', 'show']);
    Route::resource('productos', AdminProductosController::class)->only(['index']);
    Route::get('/pedidos', [AdminProductosController::class, 'index'])->name('pedidos.index');
    Route::get('/inventario', [AdminInventarioController::class, 'index'])->name('inventario.index');
});
