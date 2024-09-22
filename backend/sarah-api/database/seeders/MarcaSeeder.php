<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::factory()->create([
            'nome' => 'UrbanStyle',
            'descricao' => 'Marca focada na moda urbana, oferecendo roupas descoladas e confortáveis, como camisetas, hoodies e calças. Ideal para quem busca um visual moderno e casual.'
        ]);
        Marca::factory()->create([
            'nome' => 'EcoChic',
            'descricao' => 'Marca sustentável que utiliza materiais reciclados e orgânicos para criar peças elegantes e atemporais. Comprometida com a moda consciente e o respeito ao meio ambiente.'
        ]);
        Marca::factory()->create([
            'nome' => 'Classique',
            'descricao' => 'Marca voltada para o público que aprecia a moda clássica e sofisticada. Oferece ternos, vestidos de gala e acessórios elegantes, perfeitos para ocasiões especiais.'
        ]);
        Marca::factory()->create([
            'nome' => 'SportFlex',
            'descricao' => 'Marca especializada em roupas esportivas, oferecendo peças de alta performance para diferentes atividades físicas. Leveza, conforto e estilo são as principais características.'
        ]);
        Marca::factory()->create([
            'nome' => 'Vintage Vibes',
            'descricao' => 'Marca que traz de volta o estilo retrô, com roupas inspiradas nas décadas de 60, 70 e 80. Perfeita para quem ama um toque nostálgico no guarda-roupa.'
        ]);
        Marca::factory()->create([
            'nome' => 'BeachWear',
            'descricao' => 'Marca dedicada ao vestuário de praia, com biquínis, sungas, saídas de praia e acessórios para aproveitar os dias ensolarados. Estilo leve e colorido é a sua assinatura.'
        ]);
        Marca::factory()->create([
            'nome' => 'TrendyTeens',
            'descricao' => 'Marca voltada para adolescentes, com roupas modernas e ousadas que refletem as últimas tendências. Camisetas estampadas, jeans rasgados e tênis descolados estão sempre em alta.'
        ]);
        Marca::factory()->create([
            'nome' => 'Luxe Atelier',
            'descricao' => 'Marca de alta costura que oferece peças exclusivas e personalizadas. Foco em detalhes requintados e tecidos de qualidade, ideal para quem busca sofisticação.'
        ]);
        Marca::factory()->create([
            'nome' => 'Everyday Essentials',
            'descricao' => 'Marca que foca em roupas básicas e versáteis para o dia a dia. Camisetas, calças e moletons confortáveis, perfeitos para compor looks práticos e estilosos.'
        ]);
        Marca::factory()->create([
            'nome' => ' Adventure Gear',
            'descricao' => 'Marca especializada em roupas para atividades ao ar livre, como hiking e camping. Oferece peças resistentes e funcionais, com foco em conforto e proteção.'
        ]);
    }
}
