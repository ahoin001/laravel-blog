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
    public function definition()
    {
        return [
            "user_id" => User::factory(), // ? Laravel will use factory to create User AND grab the id and assign it to user_id here
            "category_id" => Category::factory(),
            "slug" => $this->faker->slug,
            "title" => $this->faker->sentence,
            "excerpt" => $this->faker->sentence,
            "body" => $this->faker->paragraph,
        ];
    }
}
