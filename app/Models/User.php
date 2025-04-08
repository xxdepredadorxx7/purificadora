<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * Estos campos pueden ser llenados directamente al crear o actualizar un modelo.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',        // Nombre del usuario
        'email',       // Correo electrónico del usuario
        'password',    // Contraseña del usuario
        'direccion',   // Dirección del usuario (opcional)
        'telefono',    // Teléfono del usuario (opcional)
        'role',        // Rol del usuario ('cliente', 'administrador')
    ];

    /**
     * Los atributos que deben estar ocultos al serializar el modelo.
     *
     * Estos campos no se incluirán en las respuestas JSON o al convertir el modelo a un array.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',         // Oculta la contraseña
        'remember_token',   // Oculta el token de "recordar sesión"
    ];

    /**
     * Los atributos que deben ser convertidos a un tipo de dato específico.
     *
     * Esto asegura que ciertos campos se manejen como tipos específicos al acceder a ellos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convierte la fecha de verificación del email a un objeto DateTime
            'password' => 'hashed',           // Indica que la contraseña está encriptada
        ];
    }

    /**
     * Método para obtener la imagen de perfil en AdminLTE.
     *
     * Este método retorna una URL de imagen que se mostrará en el panel de AdminLTE.
     *
     * @return string
     */
    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300'; // Imagen de ejemplo
    }

    /**
     * Método para obtener la descripción del usuario en AdminLTE.
     *
     * Este método retorna el rol del usuario como descripción.
     *
     * @return string
     */
    public function adminlte_desc()
    {
        return $this->role; // Retorna el rol del usuario ('cliente', 'administrador')
    }
}
