<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::factory()->create([
            'nome' => 'Administrador',
            'telefone' => '51987654321',
            'fk_user' => 1
        ]);

        Pessoa::factory()->create([
            'nome' => 'Empresa',
            'telefone' => '51123456789',
            'fk_user' => 2
        ]);

        Pessoa::factory()->create([
            'nome' => 'Carla Mendes',
            'telefone' => '999123456',
            'fk_user' => 8
        ]);

        Pessoa::factory()->create([
            'nome' => 'Lucas Lima',
            'telefone' => '998345678',
            'fk_user' => 7
        ]);

        Pessoa::factory()->create([
            'nome' => 'Ana Souza',
            'telefone' => '997456789',
            'fk_user' => 6
        ]);

        Pessoa::factory()->create([
            'nome' => 'Pedro Oliveira',
            'telefone' => '996567890',
            'fk_user' => 5
        ]);

        Pessoa::factory()->create([
            'nome' => 'João Silva',
            'telefone' => '994789012',
            'fk_user' => 3
        ]);

        Pessoa::factory()->create([
            'nome' => 'Maria Santos',
            'telefone' => '991012345',
            'fk_user' => 4
        ]);
    }
}
