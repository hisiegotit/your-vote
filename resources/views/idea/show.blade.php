<x-app-layout>
    <div>
        <a href="{{ $returnUrl }}" class="flex items-center font-semibold hover:underline">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z"
                    clip-rule="evenodd" />
            </svg>

            <span class="ml-2"> All idea</span>
        </a>
    </div>
    {{-- Show Idea --}}
    <livewire:show-idea :idea="$idea" :votes="$votes"/>
    {{-- End Show Idea --}}
    {{-- Modal Edit Idea --}}
    @can('update', $idea)
        <livewire:edit-idea :idea="$idea"/>
    @endcan
    {{-- End Modal Edit Idea --}}
    {{-- Delete Idea --}}
    <livewire:delete-idea/>
    {{-- End Delete Idea --}}

    <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 z-0">
        <div class="comment-container relative shadow-sm bg-surface0 rounded-xl flex mt-4 ">
            <div class="flex flex-1 px-4 py-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <div class="text-white mt-3 line-clamp-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                            <div class="font-bold">Author</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                                <div class="relative">
                                    <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                    <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                                            class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4 z-10">
                                    <li><a href="#" class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3">Mark as spam</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->
        <div class="is-admin comment-container relative shadow-sm bg-surface0 rounded-xl flex mt-4 ">
            <div class="flex flex-1 px-4 py-4">

                <div class="flex-none">
                    <a href="#">
                        <img src="https://gravatar.com/avatar/dfc61acd3adcf0a4fca1cdaa61e36e93" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center uppercase text-xxs mt-1 font-bold text-maroon">
                        Admin
                    </div>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline text-maroon">
                            Status changed to "Under consideration"
                        </a>
                    </h4>
                    <div class="text-white mt-3 line-clamp-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                            <div class="font-bold text-maroon">Admin</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                                <div class="relative">
                                    <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                                            class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4 z-10">
                                            <li><a href="#"
                                                    class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3">Mark
                                                    as spam</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->
        <div class="comment-container relative shadow-sm bg-surface0 rounded-xl flex mt-4 ">
            <div class="flex flex-1 px-4 py-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://gravatar.com/avatar/dfc61acd3adcf0a4fca1cdaa61e36e93" alt="avatar"
                            class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <div class="text-white mt-3 line-clamp-3">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, delectus.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                            <div class="font-bold">Author</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                            <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                                <div class="relative">
                                    <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 ">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                <ul x-cloak x-show="isOpen" @click.away="isOpen = false"
                                            class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4 z-10">
                                            <li><a href="#"
                                                    class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3">Mark
                                                    as spam</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->
    </div> <!-- end comments-container -->
</x-app-layout>
