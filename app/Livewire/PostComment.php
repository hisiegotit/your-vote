<?php

namespace App\Livewire;

use App\Livewire\Traits\WithAuthRedirects;
use App\Models\Comment;
use App\Notifications\CommentPosted;
use Illuminate\Http\Response;
use Livewire\Component;

class PostComment extends Component
{
    use WithAuthRedirects;

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
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $newComment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => 1,
            'body' => $this->comment,
        ]);

        $this->reset('comment');

        $this->idea->user->notify(new CommentPosted($newComment));

        $this->dispatch('commentWasPosted', 'Comment was posted.');
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}
