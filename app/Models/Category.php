<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',  
        'picture' // Ensure this is included for mass assignment
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_category');
    }
}
