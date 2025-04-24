<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un producto
        $producto = Producto::create([
            'nombre' => 'Garrafón 20L',
            'descripcion' => 'Garrafón de agua de 20 litros',
            'precio' => 50.00,
            'cantidad' => 100,
        ]);
    }
}
