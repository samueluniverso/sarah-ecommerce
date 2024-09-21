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
    }
}
