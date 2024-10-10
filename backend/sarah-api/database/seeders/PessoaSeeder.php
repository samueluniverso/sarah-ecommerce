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
    }
}
