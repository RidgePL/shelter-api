<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\DeleteEmployee;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteEmployeeController extends Controller
{
    public function __construct(private readonly DeleteEmployee $deleteEmployee)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->deleteEmployee->withId($id);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
