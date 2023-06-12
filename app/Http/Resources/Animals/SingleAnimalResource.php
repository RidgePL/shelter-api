<?php

declare(strict_types=1);

namespace App\Http\Resources\Animals;

use App\Http\Resources\Shelters\SimpleShelterResource;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleAnimalResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shelter' => SimpleShelterResource::make($this->{Animal::RELATION_SHELTER}),
            'name' => $this->{Animal::FIELD_NAME},
            'type' => $this->{Animal::FIELD_TYPE},
            'breed' => $this->{Animal::FIELD_BREED},
            'weight' => $this->{Animal::FIELD_WEIGHT},
            'age' => $this->{Animal::FIELD_AGE},
        ];
    }
}
