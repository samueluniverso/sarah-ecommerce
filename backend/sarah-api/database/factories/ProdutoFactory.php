<?php

namespace Database\Factories;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'        => fake()->name(),
            'is_destaque' => fake()->boolean(),
            'preco'       => fake()->numerify(),
            'fk_marca'    => Marca::all()->random()
        ];
    }
}
