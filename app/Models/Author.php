<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $fillable = [
        'title',
        'description',
        'story',
        'writing_philosophy',
        'award_and_recognition',
        'social_links',
        'cover_image',
    ];

    protected $casts = [
    ];

    protected $attributes = [
        'writing_philosophy' => "[]",
        'award_and_recognition' => "[]",
        'social_links' => "[]",
    ];

}
