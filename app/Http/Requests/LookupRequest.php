<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LookupRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ip' => ['required', 'ip'],
        ];
    }
}
