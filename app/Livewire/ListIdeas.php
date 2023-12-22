<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;

class ListIdeas extends Component
{
    public function render()
    {
        return view('livewire.list-ideas', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
