<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\Repositories\AssignShelter;
use App\Interfaces\Repositories\GetShelter;
use App\Interfaces\Repositories\NewEmployee;
use App\Interfaces\Services\CreateEmployee;
use App\Models\Employee;

class AddEmployeeToShelter implements CreateEmployee
{

    public function __construct(
        private readonly GetShelter $shelter,
        private readonly NewEmployee $newEmployee,
        private readonly AssignShelter $assignShelter,
    )
    {
    }

    public function withData(array $data): Employee
    {
        $shelter = $this->shelter->forId($data['shelter_id']);
        $employee = $this->newEmployee->withData($data);
        $this->assignShelter->toEmployee($shelter, $employee);

        return $employee->fresh();
    }
}
