<?php

declare(strict_types=1);

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'shelter_id' => ['required', 'integer', 'exists:shelters,id'],
            'phone' => ['required', 'string'], //This could be additionally validated if we knew for example what numbers we want to store
            'address' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric', 'min:1000', 'max:50000'],
            'age' => ['required', 'integer', 'min:18', 'max:100'],
        ];
    }
}
