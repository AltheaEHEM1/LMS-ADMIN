<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'user_id', 'book_id', 'reservation_date', 'pickup_date', 'due_date', 'status',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
