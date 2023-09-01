<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'subject' => $this->faker->sentence,
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(8)) . '</p>',
            'user_id' => User::all()->pluck('id')->random(),
            'category_id' => Category::all()->pluck('id')->random(),
            'published_at' => now(),
        ];
    }
}
