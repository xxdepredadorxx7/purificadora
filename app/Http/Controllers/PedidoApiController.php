<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoApiController extends Controller
{
    public function index()
    {
        // Solo los pedidos del usuario autenticado
        $pedidos = Pedido::with('producto')->where('user_id', Auth::id())->get();
        return response()->json($pedidos);
    }

    public function show($id)
    {
        $pedido = Pedido::with('producto')->where('user_id', Auth::id())->find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }
        return response()->json($pedido);
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        if ($producto->cantidad < $request->cantidad) {
            return response()->json(['message' => 'No hay suficiente cantidad disponible para este pedido.'], 400);
        }

        // Reducir la cantidad del producto
        $producto->cantidad -= $request->cantidad;
        $producto->save();

        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'total' => $producto->precio * $request->cantidad,
            'estado' => 'pendiente',
        ]);

        return response()->json($pedido, 201);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::where('user_id', Auth::id())->find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $request->validate([
            'cantidad' => 'sometimes|integer|min:1',
            'estado' => 'sometimes|string|in:pendiente,completado,cancelado',
        ]);

        // Solo permitir actualizar cantidad y estado
        if ($request->has('cantidad')) {
            $producto = Producto::find($pedido->producto_id);
            $diferencia = $request->cantidad - $pedido->cantidad;
            if ($producto->cantidad < $diferencia) {
                return response()->json(['message' => 'No hay suficiente cantidad disponible para actualizar el pedido.'], 400);
            }
            $producto->cantidad -= $diferencia;
            $producto->save();
            $pedido->cantidad = $request->cantidad;
            $pedido->total = $producto->precio * $request->cantidad;
        }
        if ($request->has('estado')) {
            $pedido->estado = $request->estado;
        }
        $pedido->save();

        return response()->json($pedido);
    }

    public function destroy($id)
    {
        $pedido = Pedido::where('user_id', Auth::id())->find($id);
        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }
        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado']);
    }
}
