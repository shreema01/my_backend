<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class AuthorResource extends JsonResource
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
            'story' => $this->story,
            'writing_philosophy' => $this->writing_philosophy ?? [],
            'award_and_recognition' => $this->award_and_recognition ?? [],
            'social_links' => $this->social_links ?? [],
            'cover_image' => $this->cover_image
    ? env('NEXT_PUBLIC_LARAVEL_HOST').'/uploads/authors/'.$this->cover_image
    : null,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
    }
}
