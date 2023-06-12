<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface UpdateAnimal
{
    public function withIdAndData(int $id, array $data): void;
}
