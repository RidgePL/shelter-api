<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Animal;

interface NewAnimal
{
    public function withData(array $attributes): Animal;
}
