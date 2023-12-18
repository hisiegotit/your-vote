<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Hisie',
            'email' => 'hisie.work@gmail.com',
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'Cat 1']);
        Category::factory()->create(['name' => 'Cat 2']);
        Category::factory()->create(['name' => 'Cat 3']);
        Category::factory()->create(['name' => 'Cat 4']);

        Status::factory()->create(['name' => 'Open', 'classes' => 'bg-pink text-base']);
        Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-mauve text-base']);
        Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-base']);
        Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green text-base']);
        Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-red text-base']);

        Idea::factory(100)->create();


        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }
    }
}
