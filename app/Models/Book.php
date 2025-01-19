<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'media_type',
        'category',
        'title',
        'isbn',
        'isbn_13',
        'edition',
        'year',
        'tag',
        'photo',
        'created_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_by' => 'integer',
    ];

    /**
     * Get the user who created the book.
     */
    public function creator()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'created_by');
    }
}

