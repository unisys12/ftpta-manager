<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'allDay' => 'boolean',
            'start' => 'required',
            'end' => 'required',
            'title' => 'required|string',
            'url' => 'url|nullable',
            'editable' => 'boolean',
            'overlap' => 'boolean',
            'service_id' => 'integer',
            'canine_id' => 'integer|nullable',
            'user_id' => 'integer|nullable'
        ];
    }
}
