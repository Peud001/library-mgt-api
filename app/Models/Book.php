<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'publisher_id',
        'isbn'
    ];

    public function authors(): BelongsToMany{
        return $this->belongsToMany(Author::class, 'author_book');
    }

    public function publisher(): BelongsTo{
        return $this->belongsTo(Publisher::class);
    }

    public function bookCopies(): HasMany{
        return $this->hasMany(BookCopy::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
