<?php

// app/Models/Circulation.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 'user_id', 'borrowed_date', 'due_date', 'returned_date', 'copies_borrowed', 'status',
    ];

    // Relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
