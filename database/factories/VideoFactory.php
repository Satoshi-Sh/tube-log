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
            'id' => (string) Str::uuid(),
            'user_id' => User::factory(),
            'title'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'is_featured'=>$this->faker->boolean(),
        ];
    }
}
