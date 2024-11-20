<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    /**
     * Get the book associated with this entry.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the user who owns this book.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
