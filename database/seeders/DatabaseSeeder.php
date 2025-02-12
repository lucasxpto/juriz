<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name'         => 'Lucas',
            'last_name'          => 'Pedreira',
            'numero_oab'         => '249650',
            'uf_oab'             => 'SP',
            'telefone'           => '69993329317',
            'notificar_email'    => true,
            'notificar_whatsapp' => true,
            'email'              => 'lucas@example.com',
            'password'           => 'password',
        ]);
    }
}
