<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class StatusFilters extends Component
{
    public $status = 'All';

    protected $queryString = [
        'status' => ['except' => ''],
    ];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

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

    public function mount()
    {
        if (Route::currentRouteName() !== 'idea.index') {
            $this->status = null;
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
