<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosClientesController extends Controller
{
    public function index()
{
    $pedidos = Pedido::where('user_id', Auth::id())->with('producto')->latest()->get();
    return view('pedidos.index', compact('pedidos'));
}
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->cantidad < $request->cantidad) {
            return redirect()->back()->withErrors(['error' => 'No hay suficiente cantidad disponible para este pedido.']);
        }

        // Reducir la cantidad del producto
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        // Crear el pedido
        Pedido::create([
            'user_id' => Auth::user()->id,
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'total' => $producto->precio * $request->cantidad,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado exitosamente.');
    }
}
