<?php

declare(strict_types=1);

namespace App\Interfaces\Services;

use App\Models\Employee;

interface CreateEmployee
{
    public function withData(array $data): Employee;
}
