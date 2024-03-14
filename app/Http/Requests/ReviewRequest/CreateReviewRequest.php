<?php

namespace App\Http\Requests\ReviewRequest;

use Illuminate\Foundation\Http\FormRequest;

class CreateReviewRequest extends FormRequest
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
            'stars' => 'required|in:1,2,3 4,5',
            'comment' => 'nullable|string',
            'is_hidden' => 'required|in:0, 1',
            'movie_id' => 'required|exists:movies,id',
            ];
    }

}
