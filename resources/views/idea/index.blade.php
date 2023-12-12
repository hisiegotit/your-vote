<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2 bg-surface1">
                <option value="cate1">Category 1</option>
                <option value="cate2">Category 2</option>
                <option value="cate3">Category 3</option>
                <option value="cate4">Category 4</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2 bg-surface1">
                <option value="cate1">Filter 1</option>
                <option value="cate2">Filter 2</option>
                <option value="cate3">Filter 3</option>
                <option value="cate4">Filter 4</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find idea"
                class="w-full rounded-xl px-4 py-2 pl-8 border-none placeholder-maroon bg-surface1">
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
        <div class="ideas-container space-y-6 my-8">
            <div x-data
                @click="
                const target = $event.target.tagName.toLowerCase();

                const ignores = ['button', 'svg', 'path', 'a'];

                if(! ignores.includes(target)){
                    $event.target.closest('.idea-container').querySelector('.idea-link').click();
                }
            "
                class="idea-container hover:shadow-card transition ease-out duration-150 bg-surface0 rounded-xl flex cursor-pointer">
                <div class="border-r border-maroon border-opacity-60 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="text-subtext0">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button
                            class="w-20 bg-overlay0 font-bold text-xxs uppercase rounded-xl px-4 py-3 transition ease-in duration-150 border border-overlay0 hover:border-maroon">
                            Vote
                        </button>
                    </div>
                </div>
                <div class="flex flex-1 px-2 py-6">
                    <div class="flex-none pl-4">
                        <a href="#">
                            <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">
                                {{ $idea->title }}
                            </a>
                        </h4>
                        <div class="text-white mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>{{ $idea->category->name }}</div>
                                <div>&bull;</div>
                                <div>3 comments</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div
                                    class="bg-overlay0 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4 transition duration-150 ease-in border border-overlay0 hover:border-maroon">
                                    Open</div>
                            </div>
                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                                <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>
                                    <ul x-cloak x-show="isOpen" x-transition @click.away="isOpen = false"
                                        class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4">
                                        <li><a href="#"
                                                class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3">Mark
                                                as spam</a></li>
                                        <li><a href="#"
                                                class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3">Delete
                                                post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end idea-container -->
            </div> <!-- end ideas-container -->
    @endforeach
    <div class="text-maroon">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
