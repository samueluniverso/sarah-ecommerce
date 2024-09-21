<?php

namespace Database\Seeders;

use App\Models\Pessoas;
use Illuminate\Database\Seeder;

class PessoasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoas::factory()->create([
            'nome' => 'Nome Sobrenome',
            'telefone' => '51987654321',
            'email' => 'nome.sobrenome@locahost',
            'fk_user' => 2
        ]);
    }
}
