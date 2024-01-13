<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Symfony\Component\HttpFoundation\Response;
use Livewire\Component;

class EditIdea extends Component
{
    public $category;
    public $title;
    public $description;
    public $idea;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->category = $idea->category_id;
        $this->description = $idea->description;
    }

    public function updateIdea(Idea $idea)
    {
        //Authorization
        if (auth()->guest() || auth()->user()->cannot('update', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        //Validation
        $this->validate();

        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Idea was updated successfully!');

        $this->dispatch('ideaWasUpdated');
    }

    public function render()
    {
        return view(
            'livewire.edit-idea',
            [
                'categories' => Category::all()
            ]
        );
    }
}
