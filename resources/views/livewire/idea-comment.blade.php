<div class="comment-container relative shadow-sm bg-surface0 rounded-xl flex mt-4 ">
    <div class="flex flex-1 px-4 py-4">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full mx-4">
            <div class="text-white line-clamp-3">
                @admin
                @if ($comment->spam_reports > 0)
                    <div class="text-red mb-2">Spam Reports: {{ $comment->spam_reports }}</div>
                @endif
            @endadmin
            {{ $comment->body }}
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                    <div class="font-bold">{{ $comment->user->name }}</div>
                    <div>&bull;</div>   
                    {{-- @if ($comment->user->id === $comment->idea->user->id) --}}
                    @if ($comment->user->id === $userId)
                    <div class="rounded-full border bg-overlay2 px-3 py-1 text-surface0">OWNER</div>
                    <div>&bull;</div>
                    @endif
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                @auth
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                        <div class="relative">
                            <button x-on:click="isOpen = !isOpen"
                            class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </button>
                            <ul
                            x-cloak
                            x-show="isOpen"
                            @click.away="isOpen = false"
                            class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4 z-100">
                                @can('update', $comment)
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            isOpen = false
                                            Livewire.dispatch('setEditComment',  { commentId: {{ $comment->id }} })
                                        "
                                        class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                        ">Edit comment
                                    </a>
                                </li>
                                @endcan
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            isOpen = false
                                            Livewire.dispatch('setMarkAsSpamComment', { commentId: {{ $comment->id }}})
                                        "
                                        class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                        ">Mark as spam
                                    </a>
                                </li>

                                @admin
                                @if ($comment->spam_reports > 0)
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            isOpen = false
                                            Livewire.dispatch('setMarkAsNotSpamComment', { commentId: {{ $comment->id }}})
                                        "
                                        class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                        ">Mark as not spam
                                    </a>
                                </li>
                                @endif
                                @endadmin
                                @can('delete', $comment)
                                <li>
                                    <a
                                        href="#"
                                        @click.prevent="
                                            isOpen = false
                                            Livewire.dispatch('setDeleteComment', { commentId: {{ $comment->id }} })
                                        "
                                        class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3"
                                    >
                                        Delete Comment
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div> <!-- end comment-container -->