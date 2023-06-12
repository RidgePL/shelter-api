<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shelters;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shelters\ShelterListResource;
use App\Interfaces\Repositories\ShelterList;
use Illuminate\Http\JsonResponse;

class ListSheltersController extends Controller
{
    public function __construct(private readonly ShelterList $shelterList)
    {
    }

    public function __invoke(): JsonResponse
    {
        $shelters = $this->shelterList->all();

        return new JsonResponse(ShelterListResource::collection($shelters));
    }
}
