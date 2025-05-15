<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDomainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'domain' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'domain.required' => 'Domain field is required.',
            'domain.string' => 'Domain must be a string.',
            'domain.max' => 'Domain must not be longer than 255 characters.',
        ];
    }
}
