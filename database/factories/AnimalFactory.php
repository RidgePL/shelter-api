<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enum\AnimalType;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        return [
            Animal::FIELD_NAME => $this->faker->name,
            Animal::FIELD_TYPE => $this->faker->randomElement([
                AnimalType::CAT,
            ]),
            Animal::FIELD_BREED => $this->faker->word,
            Animal::FIELD_AGE => $this->faker->numberBetween(1, 20),
            Animal::FIELD_WEIGHT => $this->faker->numberBetween(1, 20),
        ];
    }
}
