<?php

namespace App\Livewire;

use App\Jobs\NotifyVoters;
use App\Models\Comment;
use Livewire\Component;

class SetStatus extends Component
{

    public $idea;
    public $status;
    public $comment;
    public $notifyVoters;

    public function mount($idea)
    {
        $this->idea = $idea;
        $this->status = $this->idea->status_id;
    }

    public function setStatus()
    {

        if ($this->idea->status_id === (int) $this->status) {
            $this->dispatch('statusWasUpdatedError', 'Status is the same!');

            return;
        }


        $this->idea->status_id = $this->status;
        $this->idea->save();

        if ($this->notifyVoters) {
            NotifyVoters::dispatch($this->idea);
        }

        Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'status_id' => $this->status,
            'body' => $this->comment ?? 'No comment was added.',
            'is_status_update' => true,
        ]);

        $this->reset('comment');

        $this->dispatch('statusWasUpdated', 'Status was updated successfully.');
    }

    public function render()
    {
        return view('livewire.set-status');
    }
}
