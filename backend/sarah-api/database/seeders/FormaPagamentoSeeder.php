<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Seeder;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormaPagamento::factory()->create([
            'descricao' => 'Cartão de Crédito',
            'tipo'      => 'crédito'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Cartão de Débito',
            'tipo'      => 'débito'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Boleto Bancário',
            'tipo'      => 'boleto'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Transferência Bancária',
            'tipo'      => 'transferência'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'PIX',
            'tipo'      => 'pix'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Dinheiro',
            'tipo'      => 'dinheiro'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Cheque',
            'tipo'      => 'cheque'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'PayPal',
            'tipo'      => 'paypal'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Crédito Loja',
            'tipo'      => 'crédito loja'
        ]);

        FormaPagamento::factory()->create([
            'descricao' => 'Vale Alimentação',
            'tipo'      => 'vale alimentação'
        ]);
    }
}
