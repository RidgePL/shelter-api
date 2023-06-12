<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use Illuminate\Support\Collection;

interface ShelterEmployeesList
{
    public function forShelterId(int $shelterId): Collection;
}
