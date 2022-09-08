<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'text' => fake()->paragraphs(8, true),
            'title' => fake()->words(4, true),
            'user_id' => User::factory()->create()->id,
            'category_id' => /* Category::factory()->create()->id */ '1',
            'image' => 'https://source.unsplash.com/collection/1346951/1000x500?sig=3',
        ];
    }
}