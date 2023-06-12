<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

interface UpdateEmployee
{
    public function withIdAndData(int $id, array $data): void;
}
