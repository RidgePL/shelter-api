<?php

declare(strict_types=1);

namespace App\Http\Resources\Shelters;

use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleShelterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->{Shelter::FIELD_NAME},
        ];
    }
}
