<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Resources\Employees\SingleEmployeeResource;
use App\Interfaces\Services\CreateEmployee;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateEmployeeController extends Controller
{
    public function __construct(private readonly CreateEmployee $createEmployee)
    {
    }

    public function __invoke(CreateEmployeeRequest $createEmployeeRequest): JsonResponse
    {
        $employee = $this->createEmployee->withData($createEmployeeRequest->validated());

        return new JsonResponse(SingleEmployeeResource::make($employee), Response::HTTP_CREATED);
    }
}
