<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use Illuminate\Support\Collection;

interface AnimalList
{
    public function all(): Collection;
}
