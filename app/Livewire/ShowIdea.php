<?php

namespace App\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    public $idea;
    public $votes;

    public function mount(Idea $idea, $votes)
    {
        $this->idea = $idea;
        $this->votes = $votes;
    }

    public function render()
    {
        return view('livewire.show-idea');
    }
}
