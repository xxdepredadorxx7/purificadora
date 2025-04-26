<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosClientesController;
use App\Http\Controllers\PedidosClientesController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\AdminClientesController;
use App\Http\Controllers\Admin\AdminProductosController;
use App\Http\Controllers\Admin\AdminPedidosController;
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
    // Página principal del cliente
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Catálogo de productos para clientes
    Route::get('/productos', [ProductosClientesController::class, 'index'])->name('productos.index');
    Route::get('/productos/{id}/pedido', [ProductosClientesController::class, 'pedido'])->name('productos.pedido');

    // Pedidos del cliente
    Route::get('/pedidos', [PedidosClientesController::class, 'index'])->name('pedidos.index');
    Route::post('/pedidos', [PedidosClientesController::class, 'store'])->name('pedidos.store');

    // Perfil del cliente
    Route::prefix('perfil')->name('perfil.')->group(function () {
        Route::get('/', [PerfilController::class, 'index'])->name('index');
        Route::get('/editar', [PerfilController::class, 'edit'])->name('edit');
        Route::put('/', [PerfilController::class, 'update'])->name('update');
    });

    // Soporte
    Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte.index');
});

// Rutas de administración
Route::middleware([AdminMiddleware::class])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('index');
    Route::resource('clientes', AdminClientesController::class)->except(['create', 'store', 'show']);
    Route::resource('productos', AdminProductosController::class)->names('productos');
    Route::resource('pedidos', AdminPedidosController::class)->names('pedidos');
});
