<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::random(11),
            'user_id' => User::factory(),
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'published_at' => now()->subDays(rand(1, 365)),
            'is_featured'=>$this->faker->boolean(),
        ];
    }
}
