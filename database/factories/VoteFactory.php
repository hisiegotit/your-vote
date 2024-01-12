<?php

namespace Database\Factories;

use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Vote::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'idea_id' => $this->faker->numberBetween(1, Idea::count()),
        ];
    }
}
