<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVeternarianRequest extends FormRequest
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
            'business_name' => 'required|string',
            'vet_name' => 'required|string',
            'address' => 'string',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'integer',
            'phone' => 'string',
            'email' => 'email'
        ];
    }
}
