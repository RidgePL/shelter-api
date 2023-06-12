<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface DeleteShelter
{
    public function withId(int $id): void;
}
