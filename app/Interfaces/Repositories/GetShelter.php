<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Shelter;

interface GetShelter
{
    public function forId(int $id): Shelter;
}
