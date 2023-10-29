<?php

namespace App\Http\Requests\Webhook;

use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'route' => ['nullable'],
            'route_name' => ['nullable'],
            'description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
