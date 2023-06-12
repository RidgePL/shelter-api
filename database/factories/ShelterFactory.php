<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShelterFactory extends Factory
{
    protected $model = Shelter::class;

    public function definition(): array
    {
        return [
            Shelter::FIELD_NAME => $this->faker->company,
            Shelter::FIELD_ADDRESS => $this->faker->address,
            Shelter::FIELD_PHONE => $this->faker->phoneNumber,
        ];
    }
}
