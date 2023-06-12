<?php

declare(strict_types=1);

namespace App\Http\Requests\Shelters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShelterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
        ];
    }
}
