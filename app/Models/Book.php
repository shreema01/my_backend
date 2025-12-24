<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'description',
        'price',
        'rating',
        'genre',
        'readers_love',
        'sample_chapter',
        'cover_image',
    ];
    protected $casts = [
        'genre' => 'array',
        'readers_love' => 'array',  
    ];

    
    protected $attributes = [
        'genre' => "[]",
        'readers_love' => "[]",
    ];
}

