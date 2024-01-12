<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'status_id' => Status::factory(),
            'title' => ucwords($this->faker->words(4, true)),
            'description' => $this->faker->paragraphs(5, true),
        ];
    }

    public function existing(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => $this->faker->numberBetween(1, User::count()),
                'category_id' => rand(1, 4),
                'status_id' => rand(1, 5),
            ];
        });
    }
}
