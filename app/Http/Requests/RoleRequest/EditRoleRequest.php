<?php

namespace App\Http\Requests\MoviesRequest;

use Illuminate\Foundation\Http\FormRequest;

class EditMovieRequest extends FormRequest
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
            'title_en' => 'string',
            'title_ar' => 'string',
            'summary_en' => 'string',
            'summary_ar' => 'string',
            'duration' => 'integer',
            'isFree' => 'in:0, 1',
            ];
    }

}
