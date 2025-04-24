<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Inventario;
use Illuminate\Http\Request;

class AdminProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::with('inventario')->get(); // Cargar la relación 'inventario'
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $inventarios = Inventario::all();
        return view('admin.productos.create', compact('inventarios'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'nullable|integer|min:0', // Cantidad para el inventario
        ]);

        // Crear el producto
        $producto = Producto::create($request->only('nombre', 'descripcion', 'precio'));

        // Crear el inventario si se proporciona una cantidad
        if ($request->has('cantidad') && $request->cantidad > 0) {
            Inventario::create([
                'producto' => $producto->nombre,
                'cantidad' => $request->cantidad,
                'producto_id' => $producto->id, // Relacionar con el producto
            ]);
        }

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        $inventarios = Inventario::all();
        return view('admin.productos.edit', compact('producto', 'inventarios'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
