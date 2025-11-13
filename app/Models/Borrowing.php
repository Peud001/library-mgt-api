<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @return bool
 * @property \Illuminate\Support\Carbon $due_date
 */

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;

    protected $fillable = [
        'member_id',
        'book_copy_id',
        'status',
        'borrowed_date',
        'due_date',
        'returned_date'
    ];

    protected $casts = [
        'borrowed_date' => 'date',
        'due_date' => 'date',
        'returned_date' => 'date'
    ];


    public function member(): BelongsTo{
        return $this->belongsTo(Member::class);
    }

    public function bookCopy(): BelongsTo{
        return $this->belongsTo(BookCopy::class);
    }

    public function getIsOverdueAttribute(): bool{
        return optional($this->due_date) && $this->due_date->isPast() && $this->status !== 'returned';
    }
}
