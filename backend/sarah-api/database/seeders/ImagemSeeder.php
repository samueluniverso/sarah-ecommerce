<?php

namespace Database\Seeders;

use App\Models\Imagem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imagem::factory()->create([
            'nome'  => 'Bikini Estampado',
            'path' => '/images/produtos/bikini-estampado.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Blazer Classico',
            'path' => '/images/produtos/blazer-classico.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Calça Moletom',
            'path' => '/images/produtos/calca-moletom.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Camiseta Branca',
            'path' => '/images/produtos/camiseta-branca.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Camiseta Estampada',
            'path' => '/images/produtos/camiseta-estampada.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Jaqueta Jeans',
            'path' => '/images/produtos/jaqueta-jeans.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Saia Midi Seda',
            'path' => '/images/produtos/saia-midi-seda.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Top Cropped Vintage',
            'path' => '/images/produtos/top-cropped-vintage.jpg'
        ]);
        Imagem::factory()->create([
            'nome'  => 'Vestido Longo',
            'path' => '/images/produtos/vestido-longo.jpg'
        ]);
    }
}