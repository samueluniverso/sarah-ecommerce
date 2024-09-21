<?php

namespace Database\Seeders;

use App\Models\PessoasFisicas;
use Illuminate\Database\Seeder;

class PessoasFisicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PessoasFisicas::factory()->create([
            'fk_pessoa' => 1
        ]);
    }
}
