<?php

declare(strict_types=1);

namespace App\Interfaces\Services;

use App\Models\Animal;

interface CreateAnimal
{
    public function withData(array $data): Animal;
}
