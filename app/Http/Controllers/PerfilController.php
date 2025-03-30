<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    /**
     * Muestra el perfil del usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return view('Perfil.index', compact('user'));
    }

    /**
     * Muestra el formulario para editar el perfil del usuario.
     */
    public function edit()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return view('Perfil.edit', compact('user'));
    }

    /**
     * Actualiza el perfil del usuario autenticado.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Obtiene el usuario autenticado

        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Actualizar los datos del usuario
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('perfil.index')->with('success', 'Perfil actualizado con éxito.');
    }
}
