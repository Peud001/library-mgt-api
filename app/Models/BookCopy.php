<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookCopy extends Model
{
    /** @use HasFactory<\Database\Factories\BookCopyFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'barcode'
    ];

    public function book(): BelongsTo{
        return $this->belongsTo(Book::class);
    }

    public function borrowings(): HasMany{
        return $this->hasMany(Borrowing::class);
    }
}
