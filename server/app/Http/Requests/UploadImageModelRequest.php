<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageModelRequest extends FormRequest
{
    /**
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
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|string',
        ];
    }

    /**
     * Custom error messages for validation
     * @return array
     */
    public function messages()
    {
        return [
            'image.required' => 'The image is required.',
            'image.string' => 'The image must be a valid Base64 string.',
        ];
    
    }
}

