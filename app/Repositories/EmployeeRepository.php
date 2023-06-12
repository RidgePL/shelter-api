<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\Repositories\DeleteEmployee;
use App\Interfaces\Repositories\EmployeesList;
use App\Interfaces\Repositories\GetEmployee;
use App\Interfaces\Repositories\NewEmployee;
use App\Interfaces\Repositories\ShelterEmployeesList;
use App\Interfaces\Repositories\UpdateEmployee;
use App\Models\Employee;
use Illuminate\Support\Collection;

class EmployeeRepository implements EmployeesList, ShelterEmployeesList, GetEmployee, NewEmployee, DeleteEmployee, UpdateEmployee
{

    public function all(): Collection
    {
        return Employee::query()->get();
    }

    public function forShelterId(int $shelterId): Collection
    {
        return Employee::query()
            ->where('shelter_id', $shelterId)
            ->get();
    }

    public function forId(int $id): Employee
    {
        return Employee::query()->findOrFail($id);
    }

    public function withData(array $data): Employee
    {
        return new Employee($data);
    }

    public function withId(int $id): void
    {
        Employee::query()->where('id', $id)->delete();
    }

    public function withIdAndData(int $id, array $data): void
    {
        Employee::query()->where('id', $id)->update($data);
        if (isset($data['shelter_id'])) {
            $shelter = Employee::query()->findOrFail($id)->{Employee::RELATION_SHELTER};
            $shelter->update($data);
        }
    }
}
