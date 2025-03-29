<?php

use App\Http\Controllers\admin\ClientesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\InventarioController;
use App\Http\Controllers\admin\ProductosController;
use App\Http\Controllers\admin\UsuariosController;
use App\Http\Controllers\HomeController;
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
Route::get('/productos', [ProductosController::class, 'index'])
    ->middleware('auth')
    ->name('productos.index');

// Grupo de rutas para administración (todas requieren autenticación)
Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    // Inicio del panel de administración
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin.index');

    // Gestión de clientes
    Route::get('/clientes', [ClientesController::class, 'index'])->name('admin.clientes.index');

    // Gestión de productos
    Route::get('/productos', [ProductosController::class, 'index'])->name('admin.productos.index');

    // Gestión de inventario
    Route::get('/inventario', [InventarioController::class, 'index'])->name('admin.inventario.index');
});
