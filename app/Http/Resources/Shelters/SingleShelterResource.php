<?php

declare(strict_types=1);

namespace App\Http\Resources\Shelters;

use App\Http\Resources\Animals\AnimalListResource;
use App\Http\Resources\Employees\EmployeeListResource;
use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleShelterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->{Shelter::FIELD_NAME},
            'address' => $this->{Shelter::FIELD_ADDRESS},
            'phone' => $this->{Shelter::FIELD_PHONE},
            'animals' => $this->whenLoaded(Shelter::RELATION_ANIMALS, fn () => AnimalListResource::collection($this->{Shelter::RELATION_ANIMALS})),
            'employees' => $this->whenLoaded(Shelter::RELATION_EMPLOYEES, fn () => EmployeeListResource::collection($this->{Shelter::RELATION_EMPLOYEES})),
        ];
    }
}
