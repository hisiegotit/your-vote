<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_shows_on_main_page()
    {
        $categoryOne = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $categoryTwo = Category::factory()->create([
            'name' => 'Category 2'
        ]);

        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-mauve text-base']);
        $statusProgess = Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-maroon text-base']);

        $ideaOne = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $categoryOne->id,
            'status_id' => $statusConsidering->id,
            'description' => 'Description of my first idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My Second Idea',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusProgess->id,
            'description' => 'Description of my second idea',
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaOne->category->name);
        $response->assertSee($ideaOne->status->name);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($ideaTwo->category->name);
        $response->assertSee($ideaTwo->status->name);
    }

    /** @test */
    public function single_idea_shows_on_show_page()
    {
        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-maroon text-base']);

        $idea = Idea::factory()->create([
            'title' => 'My First Idea',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'description' => 'Description of my first idea',
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();

        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($idea->category->name);
        $response->assertSee($idea->status->name);
    }

    /** @test */
    public function idea_pagination_works()
    {

        $category = Category::factory()->create([
            'name' => 'Category 1'
        ]);

        $status = Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-maroon text-base']);

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);


        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My First Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My Eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);
    }
}
