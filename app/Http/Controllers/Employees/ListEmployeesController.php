<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employees\EmployeeListResource;
use App\Interfaces\Repositories\EmployeesList;
use Illuminate\Http\JsonResponse;

class ListEmployeesController extends Controller
{
    public function __construct(private readonly EmployeesList $employeesList)
    {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(EmployeeListResource::collection($this->employeesList->all()));
    }
}
