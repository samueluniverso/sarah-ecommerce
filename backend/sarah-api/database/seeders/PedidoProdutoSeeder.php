<?php

namespace Database\Seeders;

use App\Models\PedidoProduto;
use Illuminate\Database\Seeder;

class PedidoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidoProduto::factory()->create([
            'fk_pedido'  => 1,
            'fk_produto' => 3,
            'quantidade' => 2
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 2,
            'fk_produto' => 7,
            'quantidade' => 5
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 3,
            'fk_produto' => 1,
            'quantidade' => 1
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 4,
            'fk_produto' => 14,
            'quantidade' => 3
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 5,
            'fk_produto' => 9,
            'quantidade' => 4
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 6,
            'fk_produto' => 2,
            'quantidade' => 7
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 7,
            'fk_produto' => 15,
            'quantidade' => 6
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 8,
            'fk_produto' => 10,
            'quantidade' => 8
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 9,
            'fk_produto' => 20,
            'quantidade' => 10
        ]);

        PedidoProduto::factory()->create([
            'fk_pedido'  => 1,
            'fk_produto' => 18,
            'quantidade' => 2
        ]);
    }
}
