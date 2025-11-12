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
             
            // 'title' => $this->faker->sentence(3),
            // 'description' => $this->faker->sentence(10),
            // 'story' => $this->faker->paragraph(4),
            // 'writing_philosophy' => [$this->faker->word(), $this->faker->word()],
            // 'award_and_recognition' => [$this->faker->sentence(3), $this->faker->sentence(2)],
            // 'social_links' => [
            //     'facebook' => $this->faker->url(),
            //     'twitter' => $this->faker->url(),
            // ],
            // 'cover_image' => null,
       
        ];
    }
}
