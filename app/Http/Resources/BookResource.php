<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'rating' => $this->rating,
            'genre' => $this->genre ?? [],
            'readers_love' => $this->readers_love ?? [],
            
            'sample_chapter' => $this->sample_chapter,
            'cover_image' => $this->cover_image
    ? env('NEXT_PUBLIC_LARAVEL_HOST').'/uploads/books/'.$this->cover_image
    : null,

            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
