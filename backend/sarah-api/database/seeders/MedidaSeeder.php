<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medida::factory()->create([
            'completo' => 'Pequeno',
            'sigla' => 'PP',
            'comprimento' => '60',
            'largura' => '40',
            'altura' => '80'
        ]);
        Medida::factory()->create([
            'completo' => 'Pequeno',
            'sigla' => 'P',
            'comprimento' => '62',
            'largura' => '42',
            'altura' => '82'
        ]);
        Medida::factory()->create([
            'completo' => 'Médio',
            'sigla' => 'M',
            'comprimento' => '64',
            'largura' => '44',
            'altura' => '84'
        ]);
        Medida::factory()->create([
            'completo' => 'Grande',
            'sigla' => 'G',
            'comprimento' => '66',
            'largura' => '46',
            'altura' => '86'
        ]);
        Medida::factory()->create([
            'completo' => 'Extra Grande',
            'sigla' => 'GG',
            'comprimento' => '68',
            'largura' => '48',
            'altura' => '88'
        ]);
        Medida::factory()->create([
            'completo' => 'Extra Extra Grande',
            'sigla' => 'XG',
            'comprimento' => '70',
            'largura' => '50',
            'altura' => '90'
        ]);
    }
}
