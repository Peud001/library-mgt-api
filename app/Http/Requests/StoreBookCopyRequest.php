<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookCopyRequest extends FormRequest
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
            'book_id' => 'required|integer|exists:books,id',
            'barcode' => [
                'required',
                'string',
                'max:255',
                Rule::unique('book_copies', 'barcode')->ignore($this->route('bookCopy')->id),
            ],
            'status' => 'required',
            'cover_image' => 'nullable|string'
        ];
    }
}
