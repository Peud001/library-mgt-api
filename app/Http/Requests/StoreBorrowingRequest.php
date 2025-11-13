<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBorrowingRequest extends FormRequest
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
            'member_id' => 'required|integer|exists:members,id',
            'book_copy_id' => 'required|integer|exists:book_copies,id',
            'status' => 'required|string|in:borrowed,returned,overdue',
            'borrowed_date' => 'required|date',
            'due_date' => 'required|date',
            'returned_date' => 'nullable|date'
        ];
    }
}
