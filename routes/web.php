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
    return view('welcome');
});

// Ruta de inicio para usuarios autenticados
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta de productos para clientes autenticados
Route::get('/productos', [ProductosClientesController::class, 'index'])
    ->middleware('auth')
    ->name('productos.index');

//Ruta de pedidos para clientes autenticados
Route::get('/pedidos', [PedidosClientesController::class, 'index'])
    ->middleware('auth')
    ->name('pedidos.index');

// Grupo de rutas para administración (todas requieren autenticación)
Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    // Inicio del panel de administración
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin.index');

    // Gestión de clientes
    Route::get('/clientes', [AdminClientesController::class, 'index'])->name('admin.clientes.index');

    // Gestión de productos
    Route::get('/productos', [AdminProductosController::class, 'index'])->name('admin.productos.index');

    // Gestión de pedidos
    Route::get('/pedidos', [AdminProductosController::class, 'index'])->name('admin.pedidos.index');

    // Gestión de inventario
    Route::get('/inventario', [AdminInventarioController::class, 'index'])->name('admin.inventario.index');
});
