<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Shelter;
use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    private const DEFAULT_SHELTER_COUNT = 10;
    private const DEFAULT_ANIMALS_PER_SHELTER = 5;

    public function run(): void
    {
        if (Shelter::query()->doesntExist()) {
            Shelter::factory(self::DEFAULT_SHELTER_COUNT)->create();
        }

        Shelter::query()->get()->each(function ($shelter) {
            $shelter->animals()->saveMany(
                Animal::factory(self::DEFAULT_ANIMALS_PER_SHELTER)->make()
            );
        });
    }
}
