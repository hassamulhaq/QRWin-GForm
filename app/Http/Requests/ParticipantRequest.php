<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone_number' => ['nullable'],
            'address_1' => ['nullable'],
            'address_2' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
