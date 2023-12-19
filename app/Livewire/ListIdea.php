<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ListIdea extends Component
{
    public $idea;
    public $votes;
    public $hasVoted;

    public function mount(Idea $idea, $votes)
    {
        $this->idea = $idea;
        $this->votes = $votes;
        $this->hasVoted = $idea->voted_by_user;
    }


    public function render()
    {
        return view('livewire.list-idea');
    }
}
