<?php

namespace Database\Seeders;

use App\Models\PessoaEndereco;
use Illuminate\Database\Seeder;

class PessoaEnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 3,
            'fk_endereco' => 3
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 3,
            'fk_endereco' => 4
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 4,
            'fk_endereco' => 5
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 5,
            'fk_endereco' => 8
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 8,
            'fk_endereco' => 13
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 5,
            'fk_endereco' => 14
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 6,
            'fk_endereco' => 6
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 7,
            'fk_endereco' => 11
        ]);

        PessoaEndereco::factory()->create([
            'fk_pessoa'   => 4,
            'fk_endereco' => 9
        ]);
    }
}
