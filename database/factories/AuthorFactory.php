<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'title' => fake()->name(),
            'description' => fake()->paragraph(3),
            'story' => fake()->text(300),

            'writing_philosophy' => [
                fake()->sentence(),
                fake()->sentence(),
            ],

            'award_and_recognition' => [
                fake()->word(),
                fake()->word(),
            ],

            
            'social_links' => [
                'facebook' => fake()->url(),
                'twitter' => fake()->url(),
                'instagram' => fake()->url(),
            ],
            

            'cover_image' => fake()->imageUrl(640, 480, 'people', true, 'Author'),
        ];
    }
}
