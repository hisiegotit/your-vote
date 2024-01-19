<?php

namespace App\Livewire;

use Livewire\Component;

class PostComment extends Component
{

    public $idea;

    public function mount($idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}
