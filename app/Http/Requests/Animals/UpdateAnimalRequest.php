<?php

declare(strict_types=1);

namespace App\Http\Requests\Animals;

use App\Enum\AnimalType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnimalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255', Rule::in(array_column(AnimalType::cases(), 'value'))],
            'weight' => ['nullable', 'decimal:0,1', 'min:1', 'max:20'],
            'age' => ['nullable', 'integer', 'min:1', 'max:20'],
            'breed' => ['nullable', 'string', 'max:255'],
            'shelter_id' => ['nullable', 'integer', 'exists:shelters,id'],
        ];
    }
}
