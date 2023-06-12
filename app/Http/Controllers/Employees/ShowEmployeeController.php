<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Resources\Employees\SingleEmployeeResource;
use App\Interfaces\Repositories\GetEmployee;
use Illuminate\Http\JsonResponse;

class ShowEmployeeController extends Controller
{
    public function __construct(private readonly GetEmployee $getEmployee)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return new JsonResponse(new SingleEmployeeResource($this->getEmployee->forId($id)));
    }
}
