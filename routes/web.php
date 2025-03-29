<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Ruta publica
Route::get('/', function () {
    return view('welcome');
});

//Rutas Autenticadas
Auth::routes();

//Ruta de inicio Usuarios
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta de inicio Admin
Route::get('', [App\Http\Controllers\admin\HomeAdminController::class, 'index'
])->middleware('auth')
->prefix('admin');

