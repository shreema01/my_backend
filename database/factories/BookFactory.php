<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'price' => fake()->randomFloat(2, 100, 1000),
            'rating' => fake()->randomFloat(1, 1, 5),

            'genre' => [
                fake()->word(),
                fake()->word(),
            ],

            'readers_love' => [
                fake()->sentence(),
                fake()->sentence(),
            ],

            'sample_chapter' => fake()->text(300),
            'cover_image' => fake()->imageUrl(640, 480, 'books', true, 'Book'),
        ];
    }
}
