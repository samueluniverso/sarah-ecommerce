<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PessoaSeeder::class);
        $this->call(PessoaFisicaSeeder::class);
        $this->call(PessoaJuridicaSeeder::class);
        $this->call(MedidaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(CaracteristicaProdutoSeeder::class);
        $this->call(ProdutoCategoriaSeeder::class);
        $this->call(PromocaoSeeder::class);
        $this->call(EnderecoSeeder::class);
        $this->call(PessoaEnderecoSeeder::class);
        $this->call(PedidoSeeder::class);
        $this->call(PedidoProdutoSeeder::class);
        $this->call(EstoqueSeeder::class);
        $this->call(FormaPagamentoSeeder::class);
        $this->call(PagamentoSeeder::class);
        $this->call(ImagemSeeder::class);
        $this->call(ImagemProdutoSeeder::class);
    }
}
