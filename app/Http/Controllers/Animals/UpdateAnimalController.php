<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Http\Requests\Animals\UpdateAnimalRequest;
use App\Interfaces\Repositories\UpdateAnimal;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateAnimalController extends Controller
{
    public function __construct(private readonly UpdateAnimal $updateAnimal)
    {
    }

    public function __invoke(int $id, UpdateAnimalRequest $animalRequest): JsonResponse
    {
        $this->updateAnimal->withIdAndData($id, $animalRequest->validated());

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
