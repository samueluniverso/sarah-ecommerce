<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MedidaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'completo'    => fake()->name(),
            'sigla'       => fake()->name(),
            'comprimento' => fake()->numerify(),
            'largura'     => fake()->numerify(),
            'altura'      => fake()->numerify()
        ];
    }
}
