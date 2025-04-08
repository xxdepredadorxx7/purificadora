<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminClientesController extends Controller
{
    /**
     * Muestra una lista paginada de los clientes.
     */
    public function index()
    {
        // Obtiene todos los usuarios con el rol "cliente" y los pagina de 10 en 10
        $clientes = User::where('role', 'cliente')->paginate(10);

        // Retorna la vista con la lista de clientes
        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Muestra el formulario para editar un cliente específico.
     *
     * @param int $id El ID del cliente a editar.
     */
    public function edit($id)
    {
        // Busca al cliente por su ID, lanza una excepción si no lo encuentra
        $cliente = User::findOrFail($id);

        // Retorna la vista de edición con los datos del cliente
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Actualiza la información de un cliente en la base de datos.
     *
     * @param Request $request Los datos enviados desde el formulario.
     * @param int $id El ID del cliente a actualizar.
     */
    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // El nombre es obligatorio, debe ser texto y máximo de 255 caracteres
            'email' => 'required|string|email|max:255|unique:users,email,' . $id, // El email debe ser único excepto para el cliente actual
            'password' => 'nullable|string|min:8|confirmed', // La contraseña es opcional, pero si se proporciona debe ser confirmada
        ]);

        // Busca al cliente por su ID, lanza una excepción si no lo encuentra
        $cliente = User::findOrFail($id);

        // Actualiza los datos del cliente
        $cliente->name = $request->name;
        $cliente->email = $request->email;

        // Si se proporciona una contraseña, la encripta y la actualiza
        if ($request->filled('password')) {
            $cliente->password = bcrypt($request->password);
        }

        // Guarda los cambios en la base de datos
        $cliente->save();

        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Elimina un cliente de la base de datos.
     *
     * @param int $id El ID del cliente a eliminar.
     */
    public function destroy($id)
    {
        try {
            // Busca al cliente por su ID, lanza una excepción si no lo encuentra
            $cliente = User::findOrFail($id);

            // Elimina al cliente de la base de datos
            $cliente->delete();

            // Redirige a la lista de clientes con un mensaje de éxito
            return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado con éxito.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si el cliente no existe, redirige con un mensaje de error
            return redirect()->route('admin.clientes.index')->with('error', 'El cliente no existe.');
        } catch (\Exception $e) {
            // Si ocurre otro error, redirige con un mensaje de error genérico
            return redirect()->route('admin.clientes.index')->with('error', 'No se pudo eliminar el cliente.');
        }
    }
}
