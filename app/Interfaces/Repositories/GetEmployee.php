<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Employee;

interface GetEmployee
{
    public function forId(int $id): Employee;
}
