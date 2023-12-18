<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    public $idea;
    public $votes;
    public $hasVoted;

    public function mount(Idea $idea, $votes)
    {
        $this->idea = $idea;
        $this->votes = $votes;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function render()
    {
        return view('livewire.show-idea');
    }
}
