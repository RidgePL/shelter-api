<?php

declare(strict_types=1);

namespace Tests\Assemblers;

use App\Models\Shelter;

class ShelterAssembler
{
    public static function assembleList(int $count): void
    {
        Shelter::factory($count)->create();
    }

    public static function assemble(array $attributes = []): Shelter
    {
        return Shelter::factory()->create($attributes);
    }

    public static function assembleWithAnimalList(int $count): Shelter
    {
        $shelter = Shelter::factory()->create();
        AnimalAssembler::assembleListForShelter($shelter, $count);

        return $shelter;
    }

    public static function assembleWithEmployeeList(int $count): Shelter
    {
        $shelter = Shelter::factory()->create();
        EmployeeAssembler::assembleListForShelter($shelter, $count);

        return $shelter;
    }
}
