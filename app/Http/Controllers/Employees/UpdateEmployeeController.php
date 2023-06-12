<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Interfaces\Repositories\UpdateEmployee;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateEmployeeController extends Controller
{
    public function __construct(private readonly UpdateEmployee $updateEmployee)
    {
    }

    public function __invoke(int $id, UpdateEmployeeRequest $employeeRequest): JsonResponse
    {
        $this->updateEmployee->withIdAndData($id, $employeeRequest->validated());

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
