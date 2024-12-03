<?php

namespace Database\Seeders;

use App\Models\PessoaFisica;
use Illuminate\Database\Seeder;

class PessoaFisicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PessoaFisica::factory()->create([
            'fk_pessoa' => 1
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 2
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 3
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 4
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 5
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 6
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 7
        ]);
        PessoaFisica::factory()->create([
            'fk_pessoa' => 8
        ]);
    }
}
