<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Idea;
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

        Idea::factory(30)->create();
    }
}
