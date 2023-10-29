<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QrCodeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'value' => ['required'],
            'type' => ['nullable'],
            'link' => ['nullable'],
            'metadata' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
