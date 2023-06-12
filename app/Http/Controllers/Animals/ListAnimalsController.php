<?php

declare(strict_types=1);

namespace App\Http\Controllers\Animals;

use App\Http\Controllers\Controller;
use App\Http\Resources\Animals\AnimalListResource;
use App\Interfaces\Repositories\AnimalList;
use Illuminate\Http\JsonResponse;

class ListAnimalsController extends Controller
{
    public function __construct(private readonly AnimalList $animalList)
    {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(AnimalListResource::collection($this->animalList->all()));
    }
}
