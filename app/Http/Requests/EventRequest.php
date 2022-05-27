<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required|string',
            'slug'=>'required|string|unique:events',
            'startAt'=>'required|date',
            'endAt'=>'required|date'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
