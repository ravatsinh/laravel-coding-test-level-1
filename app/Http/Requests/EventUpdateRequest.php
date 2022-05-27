<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'nullable|string',
            'slug'=>'nullable|string',
            'startAt'=>'nullable',
            'endAt'=>'nullable'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
