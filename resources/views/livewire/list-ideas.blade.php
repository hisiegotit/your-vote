<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select wire:model.live="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2 bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/3">
            <select wire:model.live="filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2 bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                    <option value="Spam Ideas">Spam Ideas</option>
                @endadmin
            </select>
        </div>
        <div class="w-2/3 relative">
            <input wire:model.live.debounce.250ms="search" type="search" placeholder="Find idea"
                class="w-full rounded-xl px-4 py-2 pl-8 border-none placeholder- bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-4 text-maroon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->
    
    @forelse ($ideas as $idea)
        <livewire:list-idea
            :idea="$idea"
            :votes="$idea->votes_count"
            :key="$idea->id"
            />
    @empty
        <div class="mx-auto text-overlay1 mt-10 w-60" >
            <img src="{{ asset('img/not-found.gif') }}" class="mx-auto opacity-80 mix-blend-luminosity" alt="Not found image" />
            <div class="text-center font-bold mt-6 text-lg">No ideas were found...</div>
        </div>
    @endforelse
    <div class="text-maroon mb-6">
        {{-- {{ $ideas->links(data: ['scrollTo' => false]) }} --}}
        {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>