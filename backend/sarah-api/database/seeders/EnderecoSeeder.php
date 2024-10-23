<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endereco::factory()->create([
            'cep'         => '01310000',
            'numero'      => '1578',
            'rua'         => 'Avenida Paulista',
            'complemento' => 'Apartamento 23B'
        ]);

        Endereco::factory()->create([
            'cep'         => '22041001',
            'numero'      => '112',
            'rua'         => 'Rua Barata Ribeiro',
            'complemento' => 'Cobertura 3'
        ]);

        Endereco::factory()->create([
            'cep'         => '70040010',
            'numero'      => '45',
            'rua'         => 'Quadra 2 Asa Sul',
            'complemento' => 'Bloco A, Sala 12'
        ]);

        Endereco::factory()->create([
            'cep'         => '30190010',
            'numero'      => '345',
            'rua'         => 'Rua da Bahia',
            'complemento' => 'Loja 5'
        ]);

        Endereco::factory()->create([
            'cep'         => '80420090',
            'numero'      => '888',
            'rua'         => 'Avenida Vicente Machado',
            'complemento' => 'Casa 2'
        ]);

        Endereco::factory()->create([
            'cep'         => '40140110',
            'numero'      => '76',
            'rua'         => 'Rua Marquês de Caravelas',
            'complemento' => 'Edifício Solar'
        ]);

        Endereco::factory()->create([
            'cep'         => '90010000',
            'numero'      => '1010',
            'rua'         => 'Rua dos Andradas',
            'complemento' => 'Andar 7'
        ]);

        Endereco::factory()->create([
            'cep'         => '90050001',
            'numero'      => '230',
            'rua'         => 'Rua Lima e Silva',
            'complemento' => 'Apartamento 305'
        ]);

        Endereco::factory()->create([
            'cep'         => '95034040',
            'numero'      => '1200',
            'rua'         => 'Rua Sinimbu',
            'complemento' => 'Loja 1'
        ]);

        Endereco::factory()->create([
            'cep'         => '96020000',
            'numero'      => '85',
            'rua'         => 'Avenida Bento Gonçalves',
            'complemento' => 'Casa 10'
        ]);

        Endereco::factory()->create([
            'cep'         => '92310300',
            'numero'      => '152',
            'rua'         => 'Rua Santos Ferreira',
            'complemento' => 'Bloco C, Apartamento 23'
        ]);

        Endereco::factory()->create([
            'cep'         => '97015000',
            'numero'      => '500',
            'rua'         => 'Avenida Medianeira',
            'complemento' => 'Edifício Central'
        ]);

        Endereco::factory()->create([
            'cep'         => '99010110',
            'numero'      => '101',
            'rua'         => 'Rua Independência',
            'complemento' => 'Sala 12'
        ]);

        Endereco::factory()->create([
            'cep'         => '93320020',
            'numero'      => '400',
            'rua'         => 'Rua Joaquim Nabuco',
            'complemento' => 'Loja B'
        ]);
    }
}
