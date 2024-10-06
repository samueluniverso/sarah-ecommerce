<?php

namespace Database\Seeders;

use App\Models\PessoaJuridica;
use Illuminate\Database\Seeder;

class PessoaJuridicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PessoaJuridica::factory()->create([
            'nome_fantasia' => 'Empresa',
            'razao_social' => 'Empresa LTDA',
            'fk_pessoa' => 2
        ]);
    }
}
