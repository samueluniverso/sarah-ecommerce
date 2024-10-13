<?php

namespace Database\Seeders;

use App\Models\CaracteristicaProduto;
use Illuminate\Database\Seeder;

class CaracteristicaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Vermelha'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Floral'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Rosa'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Bordô'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 4,
            'fk_medida' => 4,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 4,
            'fk_medida' => 4,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 4,
            'fk_medida' => 4,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 4,
            'fk_medida' => 4,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 5,
            'fk_medida' => 5,
            'cor' => 'Branco'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 5,
            'fk_medida' => 5,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 5,
            'fk_medida' => 5,
            'cor' => 'Laranja'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 5,
            'fk_medida' => 5,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Floral'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Amarelo'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Azul Claro'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Escuro'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 3,
            'fk_medida' => 3,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Vermelha'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 2,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Branco'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 6,
            'fk_medida' => 6,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 5,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 5,
            'cor' => 'Azul Marinho'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 5,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 5,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 1,
            'cor' => 'Vermelho'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Creme'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Marrom'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Azul Claro'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 4,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 4,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 4,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 4,
            'cor' => 'Vermelho'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 5,
            'cor' => 'Amarelo'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,

            'fk_medida' => 5,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,

            'fk_medida' => 5,
            'cor' => 'Laranja'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,

            'fk_medida' => 5,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Floral'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Rosa'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 3,
            'cor' => 'Caqui'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 3,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 3,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 3,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Vermelho'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 2,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Branco'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Preto'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 1,
            'fk_medida' => 6,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 5,
            'cor' => 'Verde'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 5,
            'cor' => 'Azul'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 5,
            'cor' => 'Cinza'
        ]);
        CaracteristicaProduto::factory()->create([
            'fk_produto' => 2,
            'fk_medida' => 5,
            'cor' => 'Preto'
        ]);
    }
}
