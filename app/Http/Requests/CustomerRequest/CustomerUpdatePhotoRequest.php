<?php

namespace App\Http\Requests\CustomerRequest;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdatePhotoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'media' => 'array',
            'media.*' => 'nullable|mimes:jpg,jpeg,png,bmp|max:2048'
            ];
    }

}
