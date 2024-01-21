<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaComments extends Component
{
    public $idea;

    protected $listeners = ['commentWasPosted'];

    public function commentWasPosted()
    {
        $this->idea->refresh();
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            'comments' => $this->idea->comments,
        ]);
    }
}
