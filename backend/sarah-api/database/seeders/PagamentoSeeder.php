<?php

namespace Database\Seeders;

use App\Models\Pagamento;
use Illuminate\Database\Seeder;

class PagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pagamento::factory()->create([
            'fk_pedido'          => 3,
            'fk_forma_pagamento' => 1,
            'valor'              => 100.50
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 4,
            'fk_forma_pagamento' => 2,
            'valor'              => 75.30
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 5,
            'fk_forma_pagamento' => 3,
            'valor'              => 50.00
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 6,
            'fk_forma_pagamento' => 4,
            'valor'              => 200.00
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 7,
            'fk_forma_pagamento' => 5,
            'valor'              => 120.75
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 8,
            'fk_forma_pagamento' => 6,
            'valor'              => 65.90
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 9,
            'fk_forma_pagamento' => 7,
            'valor'              => 80.40
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 1,
            'fk_forma_pagamento' => 9,
            'valor'              => 90.00
        ]);

        Pagamento::factory()->create([
            'fk_pedido'          => 2,
            'fk_forma_pagamento' => 10,
            'valor'              => 45.25
        ]);
    }
}
