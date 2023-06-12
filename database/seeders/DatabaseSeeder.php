<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly SheltersSeeder $sheltersSeeder,
        private readonly AnimalsSeeder $animalsSeeder,
        private readonly EmployeesSeeder $employeesSeeder,
    ) {
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->sheltersSeeder->run();
        $this->animalsSeeder->run();
        $this->employeesSeeder->run();
    }
}
