<?php

declare(strict_types=1);

namespace Tests\Assemblers;

use App\Models\Animal;
use App\Models\Shelter;

class AnimalAssembler
{
    public static function assembleList(int $count): void
    {
        Shelter::factory()->create()->each(function ($shelter) use ($count) {
            $shelter->animals()->saveMany(
                Animal::factory($count)->make()
            );
        });
    }

    public static function assembleListForShelter(Shelter $shelter, int $count): void
    {
        $shelter->animals()->saveMany(
            Animal::factory($count)->make()
        );
    }

    public static function assemble(array $attributes = []): Animal
    {
        $shelter = ShelterAssembler::assemble();

        return $shelter->animals()->save(
            Animal::factory()->make($attributes)
        );
    }
}
