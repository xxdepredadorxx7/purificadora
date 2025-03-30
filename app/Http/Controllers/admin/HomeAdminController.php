<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;

class HomeAdminController extends Controller
{
    public function index(){
        $clientesCount = User::where('role', 'cliente')->count();
        $pedidosCount = 0; // Pedido::count();
        $productosCount = 0; // Producto::count();
        $inventarioCount = 0; // Inventario::count();
        $ultimosClientes = User::where('role', 'cliente')->latest()->take(5)->get();

        return view('admin.index', compact('clientesCount', 'pedidosCount','productosCount','inventarioCount', 'ultimosClientes'));
    }
};
