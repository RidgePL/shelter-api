<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Http\Resources\Animals\AnimalListResource;
use App\Interfaces\Repositories\ShelterAnimalsList;
use Illuminate\Http\JsonResponse;

class ListShelterAnimalsController extends Controller
{
    public function __construct(private readonly ShelterAnimalsList $shelterAnimalsList)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return new JsonResponse(AnimalListResource::collection($this->shelterAnimalsList->forShelterId($id)));
    }
}
