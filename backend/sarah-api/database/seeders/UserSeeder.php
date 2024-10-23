<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@localhost',
            'password' => Hash::make('admin'),
            'is_admin' => 1
        ]);

        User::factory()->create([
            'name'     => 'Empresa',
            'username' => 'empresa',
            'email'    => 'empresa@localhost',
            'password' => Hash::make('empresa') ,
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'João Silva',
            'username' => 'joaosilva',
            'email'    => 'joao.silva@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'Maria Santos',
            'username' => 'mariasantos',
            'email'    => 'maria.santos@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'Pedro Oliveira',
            'username' => 'pedrooliveira',
            'email'    => 'pedro.oliveira@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'Ana Souza',
            'username' => 'anasouza',
            'email'    => 'ana.souza@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'Lucas Lima',
            'username' => 'lucaslima',
            'email'    => 'lucas.lima@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name'     => 'Carla Mendes',
            'username' => 'carlamendes',
            'email'    => 'carla.mendes@localhost',
            'password' => Hash::make('senha123'),
            'is_admin' => 0
        ]);
    }
}