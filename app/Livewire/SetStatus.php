<?php

namespace App\Livewire;

use App\Mail\IdeaStatusUpdatedMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

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
            $this->notifyVoters();
        }

        $this->dispatch('statusWasUpdated');
    }

    public function notifyVoters()
    {
        $this->idea->votes()
            ->select('name', 'email')
            ->chunk(100, function ($voters) {
                foreach ($voters as $user) {
                    Mail::to($user)
                        ->queue(new IdeaStatusUpdatedMailable($this->idea));
                }
            });
    }



    public function render()
    {
        return view('livewire.set-status');
    }
}
