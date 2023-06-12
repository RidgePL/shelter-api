<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface DeleteAnimal
{
    public function withId(int $id): void;
}
