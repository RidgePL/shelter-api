<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employees\EmployeeListResource;
use App\Interfaces\Repositories\ShelterEmployeesList;
use Illuminate\Http\JsonResponse;

class ListShelterEmployeesController extends Controller
{
    public function __construct(private readonly ShelterEmployeesList $shelterEmployeesList)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return new JsonResponse(EmployeeListResource::collection($this->shelterEmployeesList->forShelterId($id)));
    }
}
