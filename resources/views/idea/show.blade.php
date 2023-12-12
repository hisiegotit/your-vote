<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z"
                    clip-rule="evenodd" />
            </svg>

            <span class="ml-2"> All idea</span>
        </a>
    </div>

    <div class="idea-container shadow-sm bg-surface0 rounded-xl flex mt-4 ">
        <div class="flex flex-1 px-4 py-4">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4 flex flex-col justify-between">
                <h4 class="text-xl font-semibold">
                    <a href="" class="hover:underline">
                        {{ $idea->title }}
                    </a>
                </h4>
                <div class="text-white mt-3">
                    {{ $idea->description }}
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-subtext1 font-semibold space-x-2">
                        <div class="font-bold text-maroon">{{ $idea->user->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <di>3 comments</di>
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
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
            <div x-data="{ isOpen: false }" class="relative">
                <button @click="isOpen = !isOpen" type="button"
                    class="flex items-center justify-center h-11 w-32 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0  transition duration-150 ease-in px-6 py-3">
                    <path fill-rule="evenodd"
                        d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
                        clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1"> Reply</span>
                </button>
                <div x-cloak x-show = "isOpen" x-transition.origin.top.left.duration.200ms @click.away="isOpen = false"
                    class="absolute z-10 w-104 text-left font-semibold text-sm bg-surface1 shadow-dialog rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                                class="w-full text-sm bg-overlay1 rounded-xl placeholder-maroon border-none px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                                placeholder="Go ahead. Share your thoughts..."></textarea>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="button"
                                class="flex items-center justify-center h-11 w-1/2 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                                <span>Post Comment</span>
                            </button>
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-5 text-maroon">
                                    <path fill-rule="evenodd"
                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div x-data = "{ isOpen: false }" class="relative">
                <button @click = "isOpen = !isOpen" type="button"
                    class="flex items-center justify-center h-11 text-xs bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                    <span class="mr-1"> Set Status</span>
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div x-cloak x-show = "isOpen" x-transition.origin.top.left.duration.200ms @click.away="isOpen = false"
                    class="absolute z-20 w-76 text-left font-semibold text-sm bg-surface1 shadow-dialog rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked=""
                                        class="text-maroon border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                        name="status" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked=""
                                        class="text-mauve border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                        name="status" value="1">
                                    <span class="ml-2 text-mauve">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked=""
                                        class="text-yellow border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                        name="status" value="1">
                                    <span class="ml-2 text-yellow">In Progess</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked=""
                                        class="text-green border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                        name="status" value="1">
                                    <span class="ml-2 text-green">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked=""
                                        class="text-red border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                        name="status" value="1">
                                    <span class="ml-2 text-red">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea name="update_comment" id="update_comment" cols="30" rows="3"
                                class="w-full text-sm bg-overlay1 rounded-xl placeholder-maroon border-none px-4 py-2 "
                                placeholder="Add an update comment (optional)"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                                <path fill-rule="evenodd"
                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                    clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1"> Attach</span>
                            </button>
                            <button type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                                <span class="ml-1">Update</span>
                            </button>
                        </div>
                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox" name="notify_voters"
                                    class="rounded bg-text text-maroon focus:outline-none focus:ring focus:ring-violet-300"
                                    checked="">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-4 ml-6">
            <div class="bg-overlay0 font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button type="button"
                class="flex items-center justify-center h-11 w-32 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0  transition duration-150 ease-in px-6 py-3">
                <span class="ml-1"> Vote</span>
            </button>
        </div>
    </div>
    {{-- Comment --}}
    <div class="comments-container relative space-y-6 ml-22 my-8 mt-1">
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
                                <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
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
                                    </ul>
                                </button>
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
                        <a href="" class="hover:underline">
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
                                <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
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
                                    </ul>
                                </button>
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
                                <button x-on:click="isOpen = !isOpen"
                                    class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7 z-20">
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
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->
    </div> <!-- end comments-container -->
</x-app-layout>
