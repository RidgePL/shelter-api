<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;


interface UpdateShelter
{
    public function withIdAndData(int $id, array $attributes): void;
}
