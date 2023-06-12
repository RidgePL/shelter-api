<?php

declare(strict_types=1);

namespace App\Http\Requests\Animals;

use App\Enum\AnimalType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAnimalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255', Rule::in(array_column(AnimalType::cases(), 'value'))],
            'breed' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:20'],
            'weight' => ['required', 'decimal:0,1', 'min:1', 'max:20'],
            'shelter_id' => ['required', 'integer', 'exists:shelters,id'],
        ];
    }
}
