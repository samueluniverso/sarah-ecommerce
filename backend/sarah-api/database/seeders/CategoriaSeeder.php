<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::factory()->create([
            'nome'      => 'Casual',
            'descricao' => 'Roupas confortáveis e descontraídas, ideais para o dia a dia. Inclui jeans, camisetas, vestidos leves e tênis.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Esportivo',
            'descricao' => 'Roupas projetadas para atividades físicas, como leggings, camisetas de performance, shorts e tênis esportivos. Conforto e mobilidade são prioridades.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Formal',
            'descricao' => 'Vestuário destinado a ocasiões especiais, como eventos de gala e reuniões de negócios. Inclui ternos, vestidos de festa e sapatos sociais.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Noite',
            'descricao' => 'Roupas para sair à noite, que podem incluir vestidos justos, saias elegantes, blusas com brilho e sapatos de salto alto. Foco no estilo e na sofisticação.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Inverno',
            'descricao' => 'Roupas quentes e aconchegantes, como casacos, suéteres, cachecóis e botas. Focadas em conforto e proteção contra o frio.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Praia',
            'descricao' => 'Peças leves e arejadas, como biquínis, sungas, saídas de praia e chapéus. Ideais para aproveitar o sol e o mar.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Trabalho',
            'descricao' => 'Roupas adequadas para o ambiente profissional. Combina blusas, saias, calças de alfaiataria e sapatos elegantes, oferecendo uma aparência polida.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Vintage',
            'descricao' => 'Roupas inspiradas em décadas passadas, como anos 20, 50 ou 80. Inclui peças únicas e retrôs, que trazem um toque nostálgico ao visual.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Sustentável',
            'descricao' => 'Roupas feitas com materiais ecológicos e práticas de produção éticas. Foco em estilo consciente e durabilidade, incluindo peças recicladas ou orgânicas.'
        ]);
        Categoria::factory()->create([
            'nome'      => 'Streetwear',
            'descricao' => 'Moda urbana e contemporânea, composta por roupas casuais e descoladas, como hoodies, calças largas, tênis e acessórios ousados.'
        ]);
    }
}
