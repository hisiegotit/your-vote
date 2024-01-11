<?php

namespace App\Livewire;

use App\Jobs\NotifyVoters;
use Livewire\Component;

class SetStatus extends Component
{

    public $idea;
    public $status;
    public $notifyVoters;

    public function mount($idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {

        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyVoters) {
            NotifyVoters::dispatch($this->idea);
        }

        $this->dispatch('statusWasUpdated');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
