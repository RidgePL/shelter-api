<?php

declare(strict_types=1);

namespace Tests\Assemblers;

use App\Models\Employee;
use App\Models\Shelter;

class EmployeeAssembler
{
    public static function assembleList(int $count): void
    {
        Shelter::factory()->create()->each(function ($shelter) use ($count) {
            $shelter->employees()->saveMany(
                Employee::factory($count)->make()
            );
        });
    }

    public static function assembleListForShelter(Shelter $shelter, int $count): void
    {
        $shelter->animals()->saveMany(
            Employee::factory($count)->make()
        );
    }

    public static function assemble(array $attributes = []): Employee
    {
        $shelter = ShelterAssembler::assemble();

        return $shelter->employees()->save(
            Employee::factory()->make($attributes)
        );
    }
}
