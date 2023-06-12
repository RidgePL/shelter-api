<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    private const DEFAULT_SHELTER_COUNT = 10;
    private const DEFAULT_EMPLOYEES_PER_SHELTER = 5;

    public function run(): void
    {
        if (Shelter::query()->doesntExist()) {
            Shelter::factory(self::DEFAULT_SHELTER_COUNT)->create();
        }

        Shelter::query()->get()->each(function ($shelter) {
            $shelter->employees()->saveMany(
                Employee::factory(self::DEFAULT_EMPLOYEES_PER_SHELTER)->make()
            );
        });
    }
}
