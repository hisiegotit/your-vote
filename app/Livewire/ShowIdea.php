<?php

namespace App\Livewire;

use App\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;

class ShowIdea extends Component
{
    use WithAuthRedirects;

    public $idea;
    public $votes;
    public $hasVoted;

    protected $listeners = [
        'statusWasUpdated',
        'statusWasUpdatedError',
        'ideaWasUpdated',
        'ideaWasMarkedAsSpam',
        'ideaWasNotASpam',
        'commentWasPosted',
        'commentWasDeleted',
    ];

    public function mount(Idea $idea, $votes)
    {
        $this->idea = $idea;
        $this->votes = $votes;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function statusWasUpdated()
    {
        $this->idea->refresh();
    }

    public function statusWasUpdatedError()
    {
        $this->idea->refresh();
    }

    public function ideaWasUpdated()
    {
        $this->idea->refresh();
    }

    public function ideaWasMarkedAsSpam()
    {
        $this->idea->refresh();
    }

    public function ideaWasNotASpam()
    {
        $this->idea->refresh();
    }

    public function commentWasPosted()
    {
        $this->idea->refresh();
    }

    public function commentWasDeleted()
    {
        $this->idea->refresh();
    }

    public function vote()
    {
        if (auth()->guest()) {
            $this->redirectToLogin();
        }

        if ($this->hasVoted) {
            $this->idea->unVote(auth()->user());
            $this->votes--;
            $this->hasVoted = false;
        } else {
            $this->idea->vote(auth()->user());
            $this->votes++;
            $this->hasVoted = true;
        }
    }

    public function render()
    {
        return view('livewire.show-idea');
    }
}
