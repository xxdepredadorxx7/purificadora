<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Producto;

class HomeAdminController extends Controller
{
    public function index(){
        $clientesCount = User::where('role', 'cliente')->count();
        $pedidosCount = 0; // Pedido::count();
        $productosCount = Producto::count();
        $ultimosClientes = User::where('role', 'cliente')->latest()->take(5)->get();

        return view('admin.index', compact('clientesCount', 'pedidosCount','productosCount', 'ultimosClientes'));
    }
};
