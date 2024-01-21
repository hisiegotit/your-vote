<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{

    public $comment;
    public $userId;

    public function mount(Comment $comment, $userId)
    {
        $this->comment = $comment;
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.idea-comment');
    }
}
