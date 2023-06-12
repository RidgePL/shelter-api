<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface DeleteEmployee
{
    public function withId(int $id): void;
}
