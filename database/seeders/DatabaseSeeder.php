<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NivelUsuario;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear niveles de usuario
        $adminNivel = NivelUsuario::create([
            'nombre_rol' => 'Admin',
            'active' => 1,
            'created' => now(),
        ]);

        $jugadorNivel = NivelUsuario::create([
            'nombre_rol' => 'Jugador',
            'active' => 1,
            'created' => now(),
        ]);

        // 2. Crear usuario administrador
        $admin = User::create([
            'usuario' => 'admin',
            'correo' => 'admin@juego.com',
            'password' => Hash::make('password123'), // Cambia esto en producción
            'nombre' => 'Administrador',
            'apellido_p' => 'Principal',
            'apellido_m' => 'Sistema',
            'id_nivel_usuario' => $adminNivel->id_nivel_usuario,
            'active' => 1,
            'created' => now(),
        ]);

        // 3. Crear usuarios de prueba (jugadores)
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'usuario' => "jugador{$i}",
                'correo' => "jugador{$i}@juego.com",
                'password' => Hash::make('password123'),
                'nombre' => "Jugador",
                'apellido_p' => "Prueba",
                'apellido_m' => "{$i}",
                'id_nivel_usuario' => $jugadorNivel->id_nivel_usuario,
                'active' => 1,
                'created' => now(),
            ]);
        }

        $this->command->info('✅ Usuarios creados:');
        $this->command->info('Admin: admin@juego.com / password123');
        $this->command->info('Jugadores: jugador1@juego.com - jugador5@juego.com / password123');
    }
}