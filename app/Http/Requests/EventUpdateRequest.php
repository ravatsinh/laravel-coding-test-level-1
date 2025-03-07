<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string|unique:events,slug,'.$this->id,
            'startAt'=>'required|date',
            'endAt'=>'required|date'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
