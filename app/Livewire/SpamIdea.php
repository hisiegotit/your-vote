<?php

namespace App\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class SpamIdea extends Component
{

    public $idea;

    public function mount($idea)
    {
        $this->idea = $idea;
    }

    public function markAsSpam(Idea $idea)
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_marked++;
        $this->idea->save();

        $this->dispatch('ideaWasMarkedAsSpam', 'Idea was marked as spam.');
    }

    public function render()
    {
        return view('livewire.spam-idea');
    }
}
