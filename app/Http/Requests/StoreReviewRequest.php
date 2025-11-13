<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreReviewRequest extends FormRequest

{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        return [
            'book_id' => 'required|string',
            'rating' => 'required|string',
            'description' => 'required|string',
            'name' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        
        return [
            
            'book_id.required' => 'Book_id field is required.',
            'rating.required' => 'Rating field is required.', 
            'description.required' => 'Description is required.',
            'name.required' => 'Name field is required.',
        ];
    }
}
