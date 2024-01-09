<?php

namespace App\Livewire;

use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class SetStatus extends Component
{

    public $idea;
    public $status;

    public function mount($idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {
        if (!auth()->check() && !auth()->user()->isAdmin()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->status_id = $this->status;
        $this->idea->save();

        $this->dispatch('statusWasUpdated');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
