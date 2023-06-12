<?php

declare(strict_types=1);

namespace App\Http\Requests\Shelters;

use Illuminate\Foundation\Http\FormRequest;

class CreateShelterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ];
    }
}
