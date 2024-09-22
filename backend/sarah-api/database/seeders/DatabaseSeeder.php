<?php

namespace Database\Seeders;

use App\Models\Medida;
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
        $this->call(MedidaSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(CategoriaSeeder::class);
        // $this->call(PromocaoSeeder::class);
        // $this->call(ProdutoSeeder::class);
    }
}
