<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shelters;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\DeleteShelter;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteShelterController extends Controller
{
    public function __construct(private readonly DeleteShelter $deleteShelter)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->deleteShelter->withId($id);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
