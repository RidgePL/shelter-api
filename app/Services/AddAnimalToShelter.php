<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\Repositories\AssignShelter;
use App\Interfaces\Repositories\GetShelter;
use App\Interfaces\Repositories\NewAnimal;
use App\Interfaces\Services\CreateAnimal;
use App\Models\Animal;

class AddAnimalToShelter implements CreateAnimal
{
    public function __construct(
        private readonly GetShelter $getShelter,
        private readonly NewAnimal $newAnimal,
        private readonly AssignShelter $assignShelter,
    ) {
    }

    public function withData(array $data): Animal
    {
        $shelter = $this->getShelter->forId($data['shelter_id']);
        $animal = $this->newAnimal->withData($data);
        $this->assignShelter->toAnimal($shelter, $animal);

        return $animal->fresh();
    }
}
