<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\Repositories\AssignShelter;
use App\Interfaces\Repositories\CreateShelter;
use App\Interfaces\Repositories\DeleteShelter;
use App\Interfaces\Repositories\GetShelter;
use App\Interfaces\Repositories\ShelterList;
use App\Interfaces\Repositories\UpdateShelter;
use App\Models\Animal;
use App\Models\Employee;
use App\Models\Shelter;
use Illuminate\Support\Collection;

class ShelterRepository implements ShelterList, GetShelter, CreateShelter, DeleteShelter, UpdateShelter, AssignShelter
{
    public function all(): Collection
    {
        return Shelter::query()->get();
    }

    public function forId(int $id): Shelter
    {
        return Shelter::query()->with([Shelter::RELATION_ANIMALS, Shelter::RELATION_EMPLOYEES])->findOrFail($id);
    }

    public function fromData(array $data): Shelter
    {
        return Shelter::query()->create($data);
    }

    public function withId(int $id): void
    {
        Shelter::query()->where('id', $id)->delete();
    }

    public function withIdAndData(int $id, array $attributes): void
    {
        Shelter::query()->where('id', $id)->update($attributes);
    }

    public function toAnimal(Shelter $shelter, Animal $animal): void
    {
        $shelter->animals()->save($animal);
    }

    public function toEmployee(Shelter $shelter, Employee $employee): void
    {
        $shelter->employees()->save($employee);
    }
}
