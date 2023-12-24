<?php

namespace App\Livewire;

use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class ListIdeas extends Component
{
    use WithPagination;

    // protected $paginationTheme = "custom";

    public function paginationView()
    {
        return 'simple-tailwind';
    }

    public function render()
    {

        $statuses = Status::all()->pluck('id', 'name');

        return view('livewire.list-ideas', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when(request()->status && request()->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get(request()->status));
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
