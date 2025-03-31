<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamar al seeder del administrador
        $this->call(AdminUserSeeder::class);

        // Crear un usuario de prueba (opcional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'name' => 'User Prueba',
            'email' => 'prueba@test.com',
            'password' => Hash::make('password'),
        ]);
    }
}
