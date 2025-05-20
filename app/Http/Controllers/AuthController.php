<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    public function updateProfile(Request $request, $id)
{
    $request->validate([
        'name' => 'sometimes|string|max:255',
        'telefono' => 'sometimes|string|max:20',
        'direccion' => 'sometimes|string|max:255',
        'current_password' => 'required_with:new_password',
        'new_password' => 'sometimes|string|min:6|confirmed',
    ]);

    $user = User::findOrFail($id);

    // Verificar contraseña actual si se quiere cambiar la contraseña
    if ($request->has('new_password')) {
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'La contraseña actual es incorrecta'], 401);
        }

        $user->password = Hash::make($request->new_password);
    }

    // Actualizar otros campos
    $user->name = $request->name ?? $user->name;
    $user->telefono = $request->telefono ?? $user->telefono;
    $user->direccion = $request->direccion ?? $user->direccion;

    $user->save();

    return response()->json([
        'message' => 'Perfil actualizado correctamente',
        'user' => $user
    ]);
}
}
