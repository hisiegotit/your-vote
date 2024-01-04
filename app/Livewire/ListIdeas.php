<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class ListIdeas extends Component
{
    // use WithPagination;

    public $status = 'All';
    public $category;

    protected $queryString = [
        'status',
        'category'
    ];


    protected $listeners = ['queryStringUpdatedStatus'];

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->status = $newStatus;
    }

    public function render()
    {

        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');

        return view('livewire.list-ideas', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })
                ->when(request()->category, function ($query) use ($categories) {
                    return $query->where('category_id', $categories->get(request()->category));
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
