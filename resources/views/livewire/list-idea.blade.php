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
                @if ($hasVoted)
                    <div class="font-semibold text-2xl text-maroon">{{ $votes }}</div>
                @else
                    <div class="font-semibold text-2xl">{{ $votes }}</div>
                @endif
                <div class="text-subtext0">Votes</div>
            </div>

            <div class="mt-8">
                @if ($hasVoted)
                    <button wire:click.prevent="vote"
                    class="w-20 bg-maroon font-bold text-surface1 text-xxs uppercase rounded-xl px-4 py-3 transition ease-in duration-150 border border-maroon hover:border-overlay0">
                        Unvote
                    </button>
                @else
                    <button wire:click.prevent="vote"
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
                    @admin
                        @if ($idea->spam_marked > 0)
                        <div class="text-red mb-2">Spam reports: {{ $idea->spam_marked }} </div>
                        @endif
                    @endadmin
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
                    <div class="flex items-center space-x-2 mr-2">
                        <div class=" {{ $idea->status->classes }}  text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                        {{ $idea->status->name }}</div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->
    </div> <!-- end ideas-container -->
</div>