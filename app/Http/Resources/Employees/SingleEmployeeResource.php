<?php

declare(strict_types=1);

namespace App\Http\Resources\Employees;

use App\Http\Resources\Shelters\SimpleShelterResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleEmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shelter' => SimpleShelterResource::make($this->{Employee::RELATION_SHELTER}),
            'name' => $this->{Employee::FIELD_NAME},
            'phone_number' => $this->{Employee::FIELD_PHONE},
            'address' => $this->{Employee::FIELD_ADDRESS},
            'age' => $this->{Employee::FIELD_AGE},
            'salary' => $this->{Employee::FIELD_SALARY},
        ];
    }
}
