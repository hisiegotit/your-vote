<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2 bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
                <option value="cate1">Category 1</option>
                <option value="cate2">Category 2</option>
                <option value="cate3">Category 3</option>
                <option value="cate4">Category 4</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2 bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
                <option value="cate1">Filter 1</option>
                <option value="cate2">Filter 2</option>
                <option value="cate3">Filter 3</option>
                <option value="cate4">Filter 4</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find idea"
                class="w-full rounded-xl px-4 py-2 pl-8 border-none placeholder-white bg-surface1 focus:outline-none focus:ring focus:ring-maroon">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-4 text-maroon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filters -->
    
    @foreach ($ideas as $idea)
        <livewire:list-idea
            :idea="$idea"
            :votes="$idea->votes_count"
            :key="$idea->id"
            />
    @endforeach
    <div class="text-maroon mb-6">
        {{ $ideas->links(data: ['scrollTo' => false]) }}
    </div>
</div>