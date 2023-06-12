<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Shelter;

interface CreateShelter
{
    public function fromData(array $data): Shelter;
}
