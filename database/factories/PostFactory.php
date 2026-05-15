<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(), 
            
            'description' => fake()->paragraph(), 
            
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
        ];
    }
}
