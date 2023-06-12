<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\Repositories\AnimalList;
use App\Interfaces\Repositories\DeleteAnimal;
use App\Interfaces\Repositories\GetAnimal;
use App\Interfaces\Repositories\NewAnimal;
use App\Interfaces\Repositories\ShelterAnimalsList;
use App\Interfaces\Repositories\UpdateAnimal;
use App\Models\Animal;
use Illuminate\Support\Collection;

class AnimalRepository implements AnimalList, ShelterAnimalsList, GetAnimal, NewAnimal, DeleteAnimal, UpdateAnimal
{
    public function all(): Collection
    {
        return Animal::query()->get();
    }

    public function forShelterId(int $id): Collection
    {
        return Animal::query()->where('shelter_id', $id)->get();
    }

    public function forId(int $id): Animal
    {
        return Animal::query()->findOrFail($id);
    }

    public function withData(array $attributes): Animal
    {
        return new Animal($attributes);
    }

    public function withId(int $id): void
    {
        Animal::query()->where('id', $id)->delete();
    }

    public function withIdAndData(int $id, array $data): void
    {
        Animal::query()->where('id', $id)->update($data);
        if (isset($data['shelter_id'])) {
            $shelter = Animal::query()->findOrFail($id)->{Animal::RELATION_SHELTER};
            $shelter->update($data);
        }
    }
}
