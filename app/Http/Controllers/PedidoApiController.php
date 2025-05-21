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

    $producto = Producto::find($pedido->producto_id);
    if (!$producto) {
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    // Actualización de cantidad (si se solicita)
    if ($request->has('cantidad')) {
        $diferencia = $request->cantidad - $pedido->cantidad;

        if ($diferencia > 0 && $producto->cantidad < $diferencia) {
            return response()->json(['message' => 'No hay suficiente cantidad disponible para actualizar el pedido.'], 400);
        }

        $producto->cantidad -= $diferencia;
        $producto->cantidad = max(0, $producto->cantidad);
        $producto->save();

        $pedido->cantidad = $request->cantidad;
        $pedido->total = $producto->precio * $request->cantidad;
    }

    // Actualización de estado (si se solicita)
    if ($request->has('estado')) {
        $estadoAnterior = $pedido->estado;
        $estadoNuevo = $request->estado;

        // Si cambia de no cancelado a cancelado → devolver stock
        if ($estadoAnterior !== 'cancelado' && $estadoNuevo === 'cancelado') {
            $producto->cantidad += $pedido->cantidad;
            $producto->save();
        }

        // Si cambia de cancelado a otro estado → volver a descontar stock
        if ($estadoAnterior === 'cancelado' && $estadoNuevo !== 'cancelado') {
            if ($producto->cantidad < $pedido->cantidad) {
                return response()->json(['message' => 'No hay suficiente stock para reactivar el pedido.'], 400);
            }
            $producto->cantidad -= $pedido->cantidad;
            $producto->cantidad = max(0, $producto->cantidad);
            $producto->save();
        }

        $pedido->estado = $estadoNuevo;
    }

    $pedido->save();

    return response()->json($pedido);
}
}
