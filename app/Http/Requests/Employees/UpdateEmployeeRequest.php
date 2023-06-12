<?php

declare(strict_types=1);

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'shelter_id' => ['nullable', 'integer', 'exists:shelters,id'],
            'phone' => ['nullable', 'string'], //This could be additionally validated if we knew for example what numbers we want to store
            'address' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'numeric', 'min:1000', 'max:50000'],
            'age' => ['nullable', 'integer', 'min:18', 'max:100'],
        ];
    }
}
