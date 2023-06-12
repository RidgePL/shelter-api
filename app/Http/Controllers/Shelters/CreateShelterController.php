<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shelters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shelters\CreateShelterRequest;
use App\Http\Resources\Shelters\SingleShelterResource;
use App\Interfaces\Repositories\CreateShelter;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateShelterController extends Controller
{
    public function __construct(private readonly CreateShelter $createShelter)
    {
    }

    public function __invoke(CreateShelterRequest $request): JsonResponse
    {
        return new JsonResponse(SingleShelterResource::make($this->createShelter->fromData($request->validated())), Response::HTTP_CREATED);
    }
}
