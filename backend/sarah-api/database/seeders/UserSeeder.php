<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('admin'),
            'is_admin' => 1
        ]);

        User::factory()->create([
            'name' => 'Empresa',
            'username' => 'empresa',
            'email' => 'empresa@localhost',
            'password' => Hash::make('empresa') ,
            'is_admin' => 0
        ]);
    }
}
