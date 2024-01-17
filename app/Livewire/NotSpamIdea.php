<?php

namespace App\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class NotSpamIdea extends Component
{

    public $idea;

    public function mount($idea)
    {
        $this->idea = $idea;
    }

    public function notASpam(Idea $idea)
    {
        if (auth()->guest() && auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->spam_marked = 0;
        $this->idea->save();

        $this->dispatch('ideaWasNotASpam', 'Idea spam reports cleared.');
    }

    public function render()
    {
        return view('livewire.not-spam-idea');
    }
}
