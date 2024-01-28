<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteComment extends Component
{

    public ?Comment $comment;

    protected $listeners = ['setDeleteComment'];

    public function setDeleteComment($commentId)
    {
        $this->comment = Comment::findOrFail($commentId);

        $this->dispatch('deleteCommentWasSet');
    }

    public function deleteComment()
    {
        if (auth()->guest() || auth()->user()->cannot('delete', $this->comment)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Comment::destroy($this->comment->id);

        $this->comment = null;

        $this->dispatch('commentWasDeleted', 'Comment was deleted!');
    }

    public function render()
    {
        return view('livewire.delete-comment');
    }
}
