<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
    use WithPagination;

    public $idea;

    protected $listeners = ['commentWasPosted', 'commentWasDeleted', 'statusWasUpdated'];

    public function commentWasPosted()
    {
        $this->idea->refresh();
        $this->gotoPage($this->idea->comments()->paginate()->lastPage());
    }

    public function commentWasDeleted()
    {
        $this->idea->refresh();
        $this->goToPage(1);
    }

    public function statusWasUpdated()
    {
        $this->idea->refresh();
        $this->goToPage($this->idea->comments()->paginate()->lastPage());
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.idea-comments', [
            // 'comments' => $this->idea->comments()->paginate()->withQueryString(),
            'comments' => Comment::with(['user', 'status'])->where('idea_id', $this->idea->id)->paginate()->withQueryString(),
        ]);
    }
}
