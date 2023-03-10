<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use ProtoneMedia\Splade\FileUploads\HasSpladeFileUploads;

class StoreCanineRequest extends FormRequest implements HasSpladeFileUploads
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
            'name' => ['required', 'string'],
            'profile_image' => ['required', 'image'],
            'breed_id' => ['required', 'integer'],
            'user_id' => ['integer'],
            'veternarian_id' => ['integer']
        ];
    }
}
