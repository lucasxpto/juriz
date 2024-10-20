<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Communication;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Communication::factory()
            ->count(30)
            ->create();
    }
}
