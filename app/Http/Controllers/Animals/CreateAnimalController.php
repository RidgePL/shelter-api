<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Animals\CreateAnimalRequest;
use App\Http\Resources\Animals\SingleAnimalResource;
use App\Interfaces\Services\CreateAnimal;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateAnimalController extends Controller
{
    public function __construct(private readonly CreateAnimal $createAnimal)
    {
    }

    public function __invoke(CreateAnimalRequest $animalRequest): JsonResponse
    {
        $animal = $this->createAnimal->withData($animalRequest->validated());

        return new JsonResponse(SingleAnimalResource::make($animal), Response::HTTP_CREATED);
    }
}
