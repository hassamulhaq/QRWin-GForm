<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['nullable'],
            'comments' => ['nullable'],
            'metadata' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
