<?php

namespace App\Http\Requests\MoviesRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'summary_en' => 'required|string',
            'summary_ar' => 'required|string',
            'duration' => 'required|integer',
            'launched_year' => 'required',
            'isFree' => 'required|in:0, 1',
            ];
    }

}
