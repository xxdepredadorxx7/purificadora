<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('user', 'producto')->get();
        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $productos = Producto::all();
        $clientes = User::where('role', 'cliente')->get();
        return view('admin.pedidos.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        try {
            $producto = Producto::findOrFail($request->producto_id);

            // Verificar si hay suficiente cantidad en el producto
            if ($producto->cantidad < $request->cantidad) {
                return redirect()->back()->withErrors(['error' => 'No hay suficiente cantidad para este pedido.']);
            }

            // Reducir la cantidad del producto
            $producto->cantidad -= $request->cantidad;
            $producto->save();

            // Calcular el total del pedido
            $total = $producto->precio * $request->cantidad;

            // Crear el pedido
            Pedido::create([
                'user_id' => $request->user_id,
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
                'total' => $total,
                'estado' => 'pendiente',
            ]);

            return redirect()->route('admin.pedidos.index')->with('success', 'Pedido creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Pedido $pedido)
    {
        $productos = Producto::all();
        $clientes = User::where('role', 'cliente')->get();
        return view('admin.pedidos.edit', compact('pedido', 'productos', 'clientes'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|string|in:pendiente,completado,cancelado',
        ]);

        try {
            $producto = Producto::findOrFail($request->producto_id);

            // Si el pedido se cancela, devolver la cantidad al producto
            if ($pedido->estado !== 'cancelado' && $request->estado === 'cancelado') {
                $producto->cantidad += $pedido->cantidad;
            }

            // Si el pedido se reactiva desde "cancelado", reducir la cantidad nuevamente
            if ($pedido->estado === 'cancelado' && $request->estado !== 'cancelado') {
                if ($producto->cantidad < $request->cantidad) {
                    return redirect()->back()->withErrors(['error' => 'No hay suficiente cantidad para este pedido.']);
                }
                $producto->cantidad -= $request->cantidad;
            }

            $producto->save();

            $pedido->update([
                'user_id' => $request->user_id,
                'producto_id' => $request->producto_id,
                'cantidad' => $request->cantidad,
                'total' => $producto->precio * $request->cantidad,
                'estado' => $request->estado,
            ]);

            return redirect()->route('admin.pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('admin.pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
