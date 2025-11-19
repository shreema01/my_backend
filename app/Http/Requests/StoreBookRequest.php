<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreBookRequest extends FormRequest
{
    
    public function authorize(): bool
    {
       
        return true;
    }

    public function rules(): array
    {
        return [
            
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'rating' => 'required|string|max:255',
            'genre' => 'nullable|array',
            'readers_love' => 'nullable|array',
            'sample_chapter' => 'required|string',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title field is required.',
            'description.required' => 'Description is required.',
            'price.required' => 'Price field is required.',
            'rating.required' => 'Rating field is required.', 
            'sample_chapter.required' =>'Sample_chapter field is required.',
        ];
    }
}
