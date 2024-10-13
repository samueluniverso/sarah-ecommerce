<?php

namespace Database\Seeders;

use App\Models\ProdutoCategoria;
use Illuminate\Database\Seeder;

class ProdutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdutoCategoria::factory()->create([
            'fk_produto' => 1,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 1,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 1,
            'fk_categoria' => 8
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 2,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 2,
            'fk_categoria' => 4
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 2,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 3,
            'fk_categoria' => 3
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 3,
            'fk_categoria' => 7
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 3,
            'fk_categoria' => 8
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 4,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 4,
            'fk_categoria' => 2
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 4,
            'fk_categoria' => 5
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 5,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 5,
            'fk_categoria' => 8
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 5,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 6,
            'fk_categoria' => 6
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 6,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 6,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 7,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 7,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 7,
            'fk_categoria' => 5
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 8,
            'fk_categoria' => 4
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 8,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 8,
            'fk_categoria' => 3
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 9,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 9,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 9,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 10,
            'fk_categoria' => 5
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 10,
            'fk_categoria' => 2
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 10,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([

            'fk_produto' => 11,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 11,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 11,
            'fk_categoria' => 5
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 12,
            'fk_categoria' => 7
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 12,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 12,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 13,
            'fk_categoria' => 3
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 13,
            'fk_categoria' => 4
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 13,
            'fk_categoria' => 8
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 14,
            'fk_categoria' => 2
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 14,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 14,
            'fk_categoria' => 6
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 15,
            'fk_categoria' => 8
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 15,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 15,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 16,
            'fk_categoria' => 6
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 16,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 16,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 17,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 17,
            'fk_categoria' => 2
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 17,
            'fk_categoria' => 7
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 18,
            'fk_categoria' => 4
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 18,
            'fk_categoria' => 3
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 18,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 19,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 19,
            'fk_categoria' => 10
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 19,
            'fk_categoria' => 9
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 20,
            'fk_categoria' => 2
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 20,
            'fk_categoria' => 1
        ]);
        ProdutoCategoria::factory()->create([
            'fk_produto' => 20,
            'fk_categoria' => 5
        ]);
    }
}
