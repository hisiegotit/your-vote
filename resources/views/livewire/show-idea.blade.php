<div class="idea-and-button container">
    <div class="idea-container shadow-sm bg-surface0 rounded-xl flex mt-4 ">
        <div class="flex flex-1 px-4 py-4">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4 flex flex-col justify-between">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">
                        {{ $idea->title }}
                    </a>
                </h4>
                <div class="text-white mt-3 text-justify">
                    @admin
                        @if ($idea->spam_marked > 0)
                        <div class="text-red mb-2">Spam reports: {{ $idea->spam_marked }} </div>
                        @endif
                    @endadmin
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
                        <div>{{ $idea->comments()->count() }} comments</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div
                            class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            {{ $idea->status->name }}</div>
                    </div>
                    <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                        @auth
                        <div class="relative">

                            <button x-on:click="isOpen = !isOpen"
                            class="relative text-left transition duration-150  bg-overlay0 border border-overlay0 hover:border-maroon rounded-full h-7">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                        <ul
                            x-cloak
                            x-show="isOpen"
                            @click.away="isOpen = false"
                           class="absolute w-38 font-semibold bg-overlay1 shadow-dialog rounded-xl py-3 ml-4 z-10">
                           @can('update', $idea)
                           <li>
                                <a
                                    href="#"
                                    @click="$dispatch('edit-modal')"
                                    class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                    ">Edit idea
                                </a>
                            </li>
                            @endcan
                            @can('delete', $idea)
                            <li>
                                 <a
                                     href="#"
                                     @click="$dispatch('delete-modal')"
                                     class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                     ">Delete  idea
                                 </a>
                             </li>
                             @endcan
                             <li>
                                  <a
                                      href="#"
                                      @click="$dispatch('spam-modal')"
                                      class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                      ">Mark as spam
                                  </a>
                              </li>
                             @admin
                             @if ($idea->spam_marked > 0)
                             <li>
                                <a
                                    href="#"
                                    @click="$dispatch('not-a-spam-modal')"
                                    class="hover:bg-overlay2 block transition ease-in duration-150 px-5 py-3
                                    ">Not a spam
                                </a>
                            </li>
                             @endif
                             @endadmin
                       </ul>    
                    </button>
                </div>
                @endauth
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->


    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
                <livewire:post-comment :idea="$idea" />
            @admin    
                <livewire:set-status :idea="$idea" />
            @endadmin
        </div>
        <div class="flex items-center space-x-4 ml-6">
            <div class="bg-overlay0 font-semibold text-center rounded-xl px-3 py-2">
                @if ($hasVoted)
                    <div class="text-xl leading-snug text-maroon">{{ $votes }}</div>
                @else
                    <div class="text-xl leading-snug">{{ $votes }}</div>
                @endif
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            @if ($hasVoted)
                <button wire:click.prevent="vote" type="button"
                    class="flex items-center justify-center h-11 w-32 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0  transition duration-150 ease-in px-6 py-3"
                    >
                    <span class="ml-1">Unvoted</span>
                </button>
            
            @else
                <button wire:click.prevent="vote" type="button"
                    class="flex items-center justify-center h-11 w-32 text-xs text-maroon bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3"
                    >
                    <span class="ml-1">Vote</span>
                </button>
            @endif
        </div>
    </div>
</div>  <!-- end idea-and-button -->