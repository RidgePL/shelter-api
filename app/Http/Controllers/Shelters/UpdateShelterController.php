<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shelters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shelters\UpdateShelterRequest;
use App\Interfaces\Repositories\UpdateShelter;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateShelterController extends Controller
{
    public function __construct(private readonly UpdateShelter $updateShelter)
    {
    }

    public function __invoke(int $id, UpdateShelterRequest $request): JsonResponse
    {
        $this->updateShelter->withIdAndData($id, $request->validated());

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
