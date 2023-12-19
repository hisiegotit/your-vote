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
                <div class="font-semibold text-2xl">{{ $idea->votes_count }}</div>
                <div class="text-subtext0">Votes</div>
            </div>

            <div class="mt-8">
                @if ($hasVoted)
                    
                <button
                class="w-20 bg-overlay0 font-bold text-xxs uppercase rounded-xl px-4 py-3 transition ease-in duration-150 border border-overlay0 hover:border-maroon disabled cursor-default" disabled>
                Voted
            </button>
            @else
            <button
            class="w-20 bg-overlay0 font-bold text-xxs uppercase rounded-xl px-4 py-3 transition ease-in duration-150 border border-overlay0 hover:border-maroon">
            Vote
        </button>
        @endif
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
                        <div class=" {{ $idea->status->classes }}  text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                        <button x-on:click="isOpen = !isOpen"
                            class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg>
                            <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
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
</div>