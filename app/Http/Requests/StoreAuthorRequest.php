<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
        return [
            'title'                 => 'required|string|max:255',
            'description'           => 'required|string|max:255',
            'story'                 => 'required|string',
            'writing_philosophy'    => 'nullable|array',
            'award_and_recognition' => 'nullable|array',
            'social_links'          => 'nullable|array',
            'cover_image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    { 
        return [
            'title.required' => 'Title field is required.',
            'description.required' => 'Description is required.',
            'story.required' => 'Story field is required.',
        ];
    }
}
