<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'member' => $this->when($this->relationLoaded('member'), $this->member),
            'book_copy' => $this->when($this->relationLoaded('bookCopy'), $this->bookCopy),
            'status' => $this->status,
            'borrowed_date' => $this->borrowed_date,
            'due_date' => $this->due_date,
            'returned_date' => $this->returned_date
        ];
    }
}
