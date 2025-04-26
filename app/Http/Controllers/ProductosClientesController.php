<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosClientesController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function pedido($id)
    {
        $producto = Producto::findOrFail($id);
        return view('pedidos.create', compact('producto'));
    }
}
