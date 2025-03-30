<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminClientesController extends Controller
{
    public function index(){
        $clientes = User::where('role', 'cliente')->paginate(10);
        return view('admin.clientes.index', compact('clientes'));
    }
    public function edit($id)
    {
        $cliente = User::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $cliente = User::findOrFail($id);
        $cliente->name = $request->name;
        $cliente->email = $request->email;

        if ($request->filled('password')) {
            $cliente->password = bcrypt($request->password);
        }

        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }
    public function destroy($id)
    {
        try {
            $cliente = $this->validarCliente($id);
            $cliente->delete();
            return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('admin.clientes.index')->with('error', 'El cliente no existe.');
        } catch (\Exception $e) {
            return redirect()->route('admin.clientes.index')->with('error', 'No se pudo eliminar el cliente.');
        }
    }
}
