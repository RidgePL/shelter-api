<?php

declare(strict_types=1);

namespace App\Interfaces\Repositories;

use App\Models\Employee;

interface NewEmployee
{
    public function withData(array $data): Employee;
}
