<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Shelter;
use Illuminate\Database\Seeder;

class SheltersSeeder extends Seeder
{
    public function run(): void
    {
        Shelter::factory(10)->create();
    }
}
