<?php

declare(strict_types=1);

namespace App\Http\Resources\Shelters;

use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShelterListResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->{Shelter::FIELD_NAME},
            'address' => $this->{Shelter::FIELD_ADDRESS},
            'phone' => $this->{Shelter::FIELD_PHONE},
        ];
    }
}
