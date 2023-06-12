<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Animal;
use App\Models\Employee;
use App\Models\Shelter;

interface AssignShelter
{
    public function toAnimal(Shelter $shelter, Animal $animal): void;
    public function toEmployee(Shelter $shelter, Employee $employee): void;
}
