<?php

declare(strict_types=1);

namespace App\Http\Controllers\Shelters;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shelters\SingleShelterResource;
use App\Interfaces\Repositories\GetShelter;
use Illuminate\Http\JsonResponse;

class ShowShelterController extends Controller
{
    //This could've been model binding however i find this approach a little cleaner. But model binding is also a good option.

    public function __construct(private readonly GetShelter $getShelter)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return new JsonResponse(SingleShelterResource::make($this->getShelter->forId($id)));
    }
}
