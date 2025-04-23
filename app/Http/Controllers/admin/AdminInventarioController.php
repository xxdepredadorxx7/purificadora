<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use Illuminate\Http\Request;

class AdminInventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('admin.inventario.index', compact('inventarios'));
    }

    public function create()
    {
        return view('admin.inventario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
        ]);

        Inventario::create($request->only('producto', 'cantidad'));

        return redirect()->route('admin.inventario.index')->with('success', 'Inventario creado exitosamente.');
    }

    public function edit(Inventario $inventario)
    {
        return view('admin.inventario.edit', compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'producto' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $inventario->update($request->all());

        return redirect()->route('admin.inventario.index')->with('success', 'Producto actualizado.');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('admin.inventario.index')->with('success', 'Producto eliminado del inventario.');
    }
}
