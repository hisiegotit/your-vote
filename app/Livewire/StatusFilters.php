<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class StatusFilters extends Component
{
    public $status;
    public $statusCounter;

    // protected $queryString = [
    //     'status' => ['except' => ''],
    //     'category' => ['except' => ''],
    // ];

    public function mount()
    {
        $this->statusCounter = Status::getCount();
        $this->status = request()->status ?? 'All';

        if (Route::currentRouteName() !== 'idea.index') {
            $this->status = null;
        }
    }

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->dispatch('queryStringUpdatedStatus', $this->status);

        if ($this->getRouteName() === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status,
            ]);
        }
    }


    public function getRouteName()
    {
        return Route::getRoutes()->match(app('request')::create(URL::previous()))->getName();
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
