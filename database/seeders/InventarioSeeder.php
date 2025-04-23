<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\Producto;

class InventarioSeeder extends Seeder
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
        ]);

        // Crear un inventario relacionado con el producto
        Inventario::create([
            'producto' => $producto->nombre,
            'cantidad' => 50,
            'producto_id' => $producto->id, // Relacionar con el producto
        ]);
    }
}
