<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // random id from user where role user
        $user = User::isUser()->inRandomOrder()->first();

        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'user_id' => $user->id,
            'published' => $this->faker->boolean,
        ];
    }
}
