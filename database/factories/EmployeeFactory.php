<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            Employee::FIELD_NAME => $this->faker->name,
            Employee::FIELD_ADDRESS => $this->faker->address,
            Employee::FIELD_PHONE => $this->faker->phoneNumber,
            Employee::FIELD_AGE => $this->faker->numberBetween(18, 65),
            Employee::FIELD_SALARY => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
