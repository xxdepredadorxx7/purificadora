<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventario::create([
            'producto' => 'Garrafón 20L',
            'cantidad' => 50,
        ]);
    }
}
