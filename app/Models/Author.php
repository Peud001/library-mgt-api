<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'nationality'
    ];

    public function books(): BelongsToMany{
        return $this->belongsToMany(Book::class, 'author_book');
    }
}
