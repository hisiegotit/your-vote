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
    use WithPagination;

    public $status;
    public $category;
    public $filter;
    public $search;

    protected $queryString = [
        'status',
        'category',
        'filter',
        'search',
    ];

    protected $listeners = ['queryStringUpdatedStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'All';
    }

    public function updatedFilter()
    {
        if ($this->filter === 'My Ideas' && !auth()->check()) {
            return redirect(route('login'));
        }
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function queryStringUpdatedStatus($newStatus)
    {
        $this->resetPage();
        $this->status = $newStatus;
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all();

        return view('livewire.list-ideas', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when($this->status && $this->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get($this->status));
                })
                ->when($this->category && $this->category !== 'All categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->when($this->filter && $this->filter === 'Top Voted', function ($query) {
                    return $query->orderByDesc('votes_count'); // votes_count is a column in the ideas table
                })
                ->when($this->filter && $this->filter === 'My Ideas', function ($query) {
                    return $query->where('user_id', auth()->id());
                })
                ->when(strlen($this->search) >= 3, function ($query) {
                    return $query->where('title', 'like', '%' . $this->search . '%');
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')])
                ->withCount('votes')
                ->orderBy('id', 'desc')
                ->simplePaginate(Idea::PAGINATION_COUNT),
            'categories' => $categories
        ]);
    }
}
