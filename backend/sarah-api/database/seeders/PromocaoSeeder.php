<?php

namespace Database\Seeders;

use App\Models\Promocao;
use Illuminate\Database\Seeder;

class PromocaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 16.0,
            'fk_produto' => 1
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 30.0,
            'fk_produto' => 2
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 60.0,
            'fk_produto' => 3
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 18.0,
            'fk_produto' => 4
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 20.0,
            'fk_produto' => 5
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 18.0,
            'fk_produto' => 6
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 30.0,
            'fk_produto' => 7
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 40.0,
            'fk_produto' => 8
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 10.0,
            'fk_produto' => 9
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 50.0,
            'fk_produto' => 10
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 24.0,
            'fk_produto' => 11
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 28.0,
            'fk_produto' => 12
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 70.0,
            'fk_produto' => 13
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 14.0,
            'fk_produto' => 14
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 18.0,
            'fk_produto' => 15
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 12.0,
            'fk_produto' => 16
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 26.0,
            'fk_produto' => 17
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 80.0,
            'fk_produto' => 18
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 8.0,
            'fk_produto' => 19
        ]);
        Promocao::factory()->create([
            'dt_inicio' => '2024-10-01',
            'dt_fim' => '2024-10-15',
            'vl_percentual' => 20,
            'vl_absoluto' => 20.0,
            'fk_produto' => 20
        ]);
    }
}
