<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\DeleteAnimal;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteAnimalController extends Controller
{
    public function __construct(private readonly DeleteAnimal $deleteAnimal)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->deleteAnimal->withId($id);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
