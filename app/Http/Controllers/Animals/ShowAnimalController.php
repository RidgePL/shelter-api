<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Http\Resources\Animals\SingleAnimalResource;
use App\Interfaces\Repositories\GetAnimal;
use Illuminate\Http\JsonResponse;

class ShowAnimalController extends Controller
{
    public function __construct(private readonly GetAnimal $getAnimal)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return new JsonResponse(SingleAnimalResource::make($this->getAnimal->forId($id)));
    }
}
