<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un producto
        $producto = Producto::create([
            'nombre' => 'Relleno de agua',
            'descripcion' => 'Relleno de garrafón de 20 litros',
            'precio' => 15.00,
            'cantidad' => 300,
        ]);

        $producto = Producto::create([
            'nombre' => 'Garrafón 20L Nuevo',
            'descripcion' => 'Garrafón de agua de 20 litros',
            'precio' => 35.00,
            'cantidad' => 100,
        ]);
    }
}
