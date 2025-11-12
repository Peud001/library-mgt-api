<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'publisher_id' => 'nullable|integer|exists:publishers,id',
            'isbn' => [
                'required',
                'string',
                Rule::unique('books', 'isbn')->ignore($this->book),
            ],
            'authors' => 'required|array|min:1',
            'authors.*' => 'exists:authors,id'
        ];
    }
}
