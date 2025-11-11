<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'author' => $this->when($this->relationLoaded('authors'), $this->authors->pluck('name')),
            'description' => $this->description,
            'isbn' => $this->isbn,
            'category' => $this->when($this->relationLoaded('category'), $this->category->name),
            'publisher' => $this->when($this->relationLoaded('publisher'), $this->publisher->name),
            'copies' => $this->when($this->relationLoaded('bookCopies'), $this->bookCopies->count()),
        ];
    }
}
