<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class PostComment extends Component
{

    public $idea;
    public $comment;

    protected $rules = [
        'comment' => 'required|min:4',
    ];

    public function mount($idea)
    {
        $this->idea = $idea;
    }

    public function postComment()
    {
        if (auth()->guest()) {
            return redirect(route('login'));
        }

        $this->validate();

        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => 1,
            'body' => $this->comment,
        ]);

        $this->reset('comment');

        $this->dispatch('commentWasPosted', 'Comment was posted.');
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}
