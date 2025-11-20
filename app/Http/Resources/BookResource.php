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
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'price'          => $this->price,
            'rating'         => $this->rating,

            // Casted array fields (auto array)
            'genre'          => $this->genre ?? [],
            'readers_love'   => $this->readers_love ?? [],

            'sample_chapter' => $this->sample_chapter,

            // Full image URL
            // 'cover_image' => $this->cover_image
            //     ? url('/uploads/books/' . $this->cover_image)
            //     : null,

                 'cover_image' => $this->cover_image
    ? env('NEXT_PUBLIC_LARAVEL_HOST') . '/uploads/books/' . $this->cover_image
    : null,

            // Standard timestamps
            'created_at'     => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at'     => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
