<?php

namespace Database\Seeders;

use App\Models\ImagemProduto;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagemProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImagemProduto::factory()->create([
            'fk_imagem'  => 5,
            'fk_produto' => 1
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 9,
            'fk_produto' => 2
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 2,
            'fk_produto' => 3
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 3,
            'fk_produto' => 4
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 8,
            'fk_produto' => 5
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 1,
            'fk_produto' => 6
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 6,
            'fk_produto' => 7
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 7,
            'fk_produto' => 8
        ]);
        ImagemProduto::factory()->create([
            'fk_imagem'  => 4,
            'fk_produto' => 9
        ]);
    }
}