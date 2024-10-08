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
    }
}
