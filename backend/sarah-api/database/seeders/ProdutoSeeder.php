<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::factory()->create([
            'nome'  => 'Camiseta Estampada',
            'is_destaque' => 't',
            'preco' => 79.90,
            'fk_marca' => 1
        ]);
        Produto::factory()->create([
            'nome'  => 'Vestido Longo de Algodão',
            'is_destaque' => 'f',
            'preco' => 149.90,
            'fk_marca' => 2
        ]);
        Produto::factory()->create([
            'nome'  => 'Blazer Clássico',
            'is_destaque' => 't',
            'preco' => 299.90,
            'fk_marca' => 3
        ]);
        Produto::factory()->create([
            'nome'  => 'Calça de Moletom',
            'is_destaque' => 'f',
            'preco' => 89.90,
            'fk_marca' => 4
        ]);
        Produto::factory()->create([
            'nome'  => 'Top Cropped Vintage',
            'is_destaque' => 't',
            'preco' => 99.90,
            'fk_marca' => 5
        ]);
        Produto::factory()->create([
            'nome'  => 'Biquíni Estampado',
            'is_destaque' => 't',
            'preco' => 89.90,
            'fk_marca' => 6
        ]);
        Produto::factory()->create([
            'nome'  => 'Jaqueta Jeans',
            'is_destaque' => 'f',
            'preco' => 149.90,
            'fk_marca' => 7
        ]);
        Produto::factory()->create([
            'nome'  => 'Saia Midi de Seda',
            'is_destaque' => 't',
            'preco' => 199.90,
            'fk_marca' => 8
        ]);
        Produto::factory()->create([
            'nome'  => 'Camiseta Básica',
            'is_destaque' => 'f',
            'preco' => 49.90,
            'fk_marca' => 9
        ]);
        Produto::factory()->create([
            'nome'  => 'Jaqueta Impermeável',
            'is_destaque' => 't',
            'preco' => 249.90,
            'fk_marca' => 10
        ]);
        Produto::factory()->create([
            'nome'  => 'Hoodie Estiloso',
            'is_destaque' => 't',
            'preco' => 119.90,
            'fk_marca' => 1
        ]);
        Produto::factory()->create([
            'nome'  => 'Calça de Linho',
            'is_destaque' => 'f',
            'preco' => 139.90,
            'fk_marca' => 2
        ]);
        Produto::factory()->create([
            'nome'  => 'Conjunto de Festa',
            'is_destaque' => 't',
            'preco' => 349.90,
            'fk_marca' => 3
        ]);
        Produto::factory()->create([
            'nome'  => 'Regata Esportiva',
            'is_destaque' => 'f',
            'preco' => 69.90,
            'fk_marca' => 4
        ]);
        Produto::factory()->create([
            'nome'  => 'Camisa Retrô',
            'is_destaque' => 't',
            'preco' => 89.90,
            'fk_marca' => 5
        ]);
        Produto::factory()->create([
            'nome'  => 'Saída de Praia',
            'is_destaque' => 't',
            'preco' => 59.90,
            'fk_marca' => 6
        ]);
        Produto::factory()->create([
            'nome'  => 'Calça Cargo',
            'is_destaque' => 'f',
            'preco' => 129.90,
            'fk_marca' => 7
        ]);
        Produto::factory()->create([
            'nome'  => 'Vestido de Noite',
            'is_destaque' => 't',
            'preco' => 399.90,
            'fk_marca' => 8
        ]);
        Produto::factory()->create([
            'nome'  => 'T-shirt Básica',
            'is_destaque' => 'f',
            'preco' => 39.90,
            'fk_marca' => 9
        ]);
        Produto::factory()->create([
            'nome'  => 'Camisa de Hiking',
            'is_destaque' => 't',
            'preco' => 99.90,
            'fk_marca' => 10
        ]);
    }
}

// Entrada
// Crie produtos com as seguintes informacoes: nome, is_destaque (verdadeiro ou falso), preco, fk_marca (Codigo da marca que o produto pertence).
// Use como base as seguintes marcas de produtos:
// id |        nome         |                                                                                    descricao                                                                                     
// ----+---------------------+----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   1 | UrbanStyle          | Marca focada na moda urbana, oferecendo roupas descoladas e confortáveis, como camisetas, hoodies e calças. Ideal para quem busca um visual moderno e casual.
//   2 | EcoChic             | Marca sustentável que utiliza materiais reciclados e orgânicos para criar peças elegantes e atemporais. Comprometida com a moda consciente e o respeito ao meio ambiente.
//   3 | Classique           | Marca voltada para o público que aprecia a moda clássica e sofisticada. Oferece ternos, vestidos de gala e acessórios elegantes, perfeitos para ocasiões especiais.
//   4 | SportFlex           | Marca especializada em roupas esportivas, oferecendo peças de alta performance para diferentes atividades físicas. Leveza, conforto e estilo são as principais características.
//   5 | Vintage Vibes       | Marca que traz de volta o estilo retrô, com roupas inspiradas nas décadas de 60, 70 e 80. Perfeita para quem ama um toque nostálgico no guarda-roupa.
//   6 | BeachWear           | Marca dedicada ao vestuário de praia, com biquínis, sungas, saídas de praia e acessórios para aproveitar os dias ensolarados. Estilo leve e colorido é a sua assinatura.
//   7 | TrendyTeens         | Marca voltada para adolescentes, com roupas modernas e ousadas que refletem as últimas tendências. Camisetas estampadas, jeans rasgados e tênis descolados estão sempre em alta.
//   8 | Luxe Atelier        | Marca de alta costura que oferece peças exclusivas e personalizadas. Foco em detalhes requintados e tecidos de qualidade, ideal para quem busca sofisticação.
//   9 | Everyday Essentials | Marca que foca em roupas básicas e versáteis para o dia a dia. Camisetas, calças e moletons confortáveis, perfeitos para compor looks práticos e estilosos.
//  10 |  Adventure Gear     | Marca especializada em roupas para atividades ao ar livre, como hiking e camping. Oferece peças resistentes e funcionais, com foco em conforto e proteção.
