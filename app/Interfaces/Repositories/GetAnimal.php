<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Animal;

interface GetAnimal
{
    public function forId(int $id): Animal;
}
