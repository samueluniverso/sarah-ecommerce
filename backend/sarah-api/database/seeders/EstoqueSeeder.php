<?php

namespace Database\Seeders;

use App\Models\Estoque;
use Illuminate\Database\Seeder;

class EstoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Estoque::factory()->create([
        //     'fk_produto'                => '',
        //     'fk_medida'                 => '',
        //     'fk_caracteristica_produto' => '',
        //     'maximo'                    => '',
        //     'minimo'                    => '',
        //     'quantidade'                => '',
        //     'ponto_pedido'              => ''
        // ]);

        Estoque::factory()->create([
            'fk_produto'                => 1,
            'fk_medida'                 => 1,
            'fk_caracteristica_produto' => 5,
            'maximo'                    => 100,
            'minimo'                    => 20,
            'quantidade'                => 75,
            'ponto_pedido'              => 25
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 2,
            'fk_medida'                 => 2,
            'fk_caracteristica_produto' => 10,
            'maximo'                    => 200,
            'minimo'                    => 50,
            'quantidade'                => 125,
            'ponto_pedido'              => 60
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 3,
            'fk_medida'                 => 3,
            'fk_caracteristica_produto' => 15,
            'maximo'                    => 300,
            'minimo'                    => 100,
            'quantidade'                => 150,
            'ponto_pedido'              => 110
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 4,
            'fk_medida'                 => 4,
            'fk_caracteristica_produto' => 20,
            'maximo'                    => 150,
            'minimo'                    => 30,
            'quantidade'                => 85,
            'ponto_pedido'              => 35
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 5,
            'fk_medida'                 => 5,
            'fk_caracteristica_produto' => 25,
            'maximo'                    => 120,
            'minimo'                    => 40,
            'quantidade'                => 90,
            'ponto_pedido'              => 45
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 6,
            'fk_medida'                 => 6,
            'fk_caracteristica_produto' => 30,
            'maximo'                    => 180,
            'minimo'                    => 60,
            'quantidade'                => 140,
            'ponto_pedido'              => 70
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 7,
            'fk_medida'                 => 1,
            'fk_caracteristica_produto' => 35,
            'maximo'                    => 250,
            'minimo'                    => 80,
            'quantidade'                => 200,
            'ponto_pedido'              => 100
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 8,
            'fk_medida'                 => 2,
            'fk_caracteristica_produto' => 40,
            'maximo'                    => 220,
            'minimo'                    => 70,
            'quantidade'                => 160,
            'ponto_pedido'              => 80
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 9,
            'fk_medida'                 => 3,
            'fk_caracteristica_produto' => 45,
            'maximo'                    => 130,
            'minimo'                    => 45,
            'quantidade'                => 100,
            'ponto_pedido'              => 50
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 10,
            'fk_medida'                 => 4,
            'fk_caracteristica_produto' => 50,
            'maximo'                    => 160,
            'minimo'                    => 55,
            'quantidade'                => 115,
            'ponto_pedido'              => 60
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 11,
            'fk_medida'                 => 5,
            'fk_caracteristica_produto' => 55,
            'maximo'                    => 200,
            'minimo'                    => 70,
            'quantidade'                => 180,
            'ponto_pedido'              => 80
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 12,
            'fk_medida'                 => 6,
            'fk_caracteristica_produto' => 60,
            'maximo'                    => 240,
            'minimo'                    => 80,
            'quantidade'                => 210,
            'ponto_pedido'              => 90
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 13,
            'fk_medida'                 => 1,
            'fk_caracteristica_produto' => 65,
            'maximo'                    => 300,
            'minimo'                    => 90,
            'quantidade'                => 250,
            'ponto_pedido'              => 100
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 14,
            'fk_medida'                 => 2,
            'fk_caracteristica_produto' => 70,
            'maximo'                    => 190,
            'minimo'                    => 60,
            'quantidade'                => 160,
            'ponto_pedido'              => 75
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 15,
            'fk_medida'                 => 3,
            'fk_caracteristica_produto' => 75,
            'maximo'                    => 210,
            'minimo'                    => 50,
            'quantidade'                => 180,
            'ponto_pedido'              => 85
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 16,
            'fk_medida'                 => 4,
            'fk_caracteristica_produto' => 25,
            'maximo'                    => 120,
            'minimo'                    => 40,
            'quantidade'                => 90,
            'ponto_pedido'              => 45
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 17,
            'fk_medida'                 => 5,
            'fk_caracteristica_produto' => 30,
            'maximo'                    => 150,
            'minimo'                    => 70,
            'quantidade'                => 100,
            'ponto_pedido'              => 55
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 18,
            'fk_medida'                 => 6,
            'fk_caracteristica_produto' => 35,
            'maximo'                    => 180,
            'minimo'                    => 80,
            'quantidade'                => 140,
            'ponto_pedido'              => 65
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 19,
            'fk_medida'                 => 1,
            'fk_caracteristica_produto' => 40,
            'maximo'                    => 130,
            'minimo'                    => 45,
            'quantidade'                => 100,
            'ponto_pedido'              => 50
        ]);

        Estoque::factory()->create([
            'fk_produto'                => 20,
            'fk_medida'                 => 2,
            'fk_caracteristica_produto' => 45,
            'maximo'                    => 250,
            'minimo'                    => 90,
            'quantidade'                => 220,
            'ponto_pedido'              => 100
        ]);
    }
}
