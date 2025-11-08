<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $table = 'reviews';
    protected $fillable = [
        'book_id',
        'rating',
        'description',
        'name',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
