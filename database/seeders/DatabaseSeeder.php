<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory()->create(['name' => 'Cat 1']);
        Category::factory()->create(['name' => 'Cat 2']);
        Category::factory()->create(['name' => 'Cat 3']);
        Category::factory()->create(['name' => 'Cat 4']);

        Status::factory()->create(['name' => 'Open', 'classes' => 'bg-pink text-base']);
        Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-mauve text-base']);
        Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-base']);
        Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green text-base']);
        Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-red text-base']);

        Idea::factory(30)->create();
    }
}
