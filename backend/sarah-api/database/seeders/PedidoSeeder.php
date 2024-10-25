<?php

namespace Database\Seeders;

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+5 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Pedido entregue com sucesso.',
            'fk_pessoa'       => 3,
            'fk_endereco'     => 1
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+2 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Entrega rápida.',
            'fk_pessoa'       => 4,
            'fk_endereco'     => 2
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+10 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Precisa de embalagem especial.',
            'fk_pessoa'       => 5,
            'fk_endereco'     => 3
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+1 day')),
            'dt_cancelamento' => null,
            'observacao'      => 'Urgente!',
            'fk_pessoa'       => 6,
            'fk_endereco'     => 4
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+3 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Pedido realizado em promoção.',
            'fk_pessoa'       => 7,
            'fk_endereco'     => 5
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+4 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Aguardando pagamento.',
            'fk_pessoa'       => 8,
            'fk_endereco'     => 6
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+7 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Inclui itens de devolução.',
            'fk_pessoa'       => 3,
            'fk_endereco'     => 7
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+1 day')),
            'dt_cancelamento' => null,
            'observacao'      => 'Entrega agendada para amanhã.',
            'fk_pessoa'       => 4,
            'fk_endereco'     => 8
        ]);

        Pedido::factory()->create([
            'dt_pedido'       => date('Y-m-d'),
            'dt_entrega'      => date('Y-m-d', strtotime('+5 days')),
            'dt_cancelamento' => null,
            'observacao'      => 'Cliente VIP.',
            'fk_pessoa'       => 5,
            'fk_endereco'     => 9
        ]);
    }
}
