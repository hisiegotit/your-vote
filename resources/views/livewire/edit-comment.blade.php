<div
    x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    x-init="
    Livewire.on('commentWasUpdated', () => {
        isOpen = false
    })
    Livewire.on('editCommentWasSet', () => {
        isOpen = true
        $nextTick(() => $refs.editComment.focus())
    })
    "
    class="fixed z-10 inset-0 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
>
    <div class="flex items-end justify-center min-h-screen">
        <div
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            aria-hidden="true">
        </div>

        <div class="border-2 border-maroon border-b-0 modal relative transform overflow-hidden rounded-tl-xl rounded-tr-xl bg-surface0 transition-all py-2 sm:w-full sm:max-w-lg">
        <div
            @click="isOpen = false"
            type="button"
            class="btn flex justify-center align-center border-b-2 rounded-xl border-surface0 transition duration-200 ease-in hover:border-maroon cursor-pointer">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-8 h-8 pb-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
            </svg>                  
        </div>
            <div class="bg-surface0 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <h3 class="text-center text-xl font-medium text-white">Edit Comment</h3>

                <form wire:submit="updateComment" action="#" method="PUT" class="space-y-4 px-4 py-6">
                    <div>
                        <textarea x-ref="editComment" wire:model.live="body" name="idea" cols="30" rows="4" class="border-none w-full bg-surface1 rounded-xl placeholder-subtext0 text-sm text-white px-4 py-2 focus:outline-none focus:ring focus:ring-maroon" placeholder="Enter your comment" required></textarea>
                        @error('body')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs text-maroon bg-surface1 font-semibold rounded-xl border border-surface1 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-5">
                                <path fill-rule="evenodd"
                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                        <button
                            type="submit"
                            class="flex items-center justify-center w-1/2 h-11 text-xs text-surface1 bg-maroon font-semibold rounded-xl border border-maroon hover:border-surface1 transition duration-150 ease-in px-6 py-3">
                            <path
                                d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                            <span class="ml-1">Update</span>
                        </button>
                    </div>
                </form>
            </div>

        </div> <!-- end modal -->
    </div>
</div>