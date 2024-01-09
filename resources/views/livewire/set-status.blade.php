<div>
    <div
        x-data = "{ isOpen: false }"
        x-init="window.livewire.on('statusWasUpdated', () => { isOpen = false })"
        class="relative">
        <button @click = "isOpen = !isOpen" type="button"
            class="flex items-center justify-center h-11 text-xs text-maroon bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
            <span class="mr-1"> Set Status</span>
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div 
        @click.away = "isOpen = false"
        x-cloak x-show = "isOpen"
            class="absolute z-20 w-76 text-left font-semibold text-sm bg-surface1 shadow-dialog rounded-xl mt-2">
            <form wire:submit.prevent="setStatus" action="#" class="space-y-4 px-4 py-6">
                <div class="space-y-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" checked=""
                                class="text-pink border-none bg-text focus:outline-none focus:ring focus:ring-pink"
                                name="status" value="1"
                                wire:model="status">
                            <span class="ml-2">Open</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" checked=""
                                class="text-mauve border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                name="status" value="2"
                                wire:model="status">
                            <span class="ml-2 text-mauve">Considering</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" checked=""
                                class="text-yellow border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                name="status" value="3"
                                wire:model="status">
                            <span class="ml-2 text-yellow">In Progess</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" checked=""
                                class="text-green border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                name="status" value="4"
                                wire:model="status">
                            <span class="ml-2 text-green">Implemented</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center">
                            <input type="radio" checked=""
                                class="text-red border-none bg-text focus:outline-none focus:ring focus:ring-maroon"
                                name="status" value="5"
                                wire:model="status">
                            <span class="ml-2 text-red">Closed</span>
                        </label>
                    </div>
                </div>
                <div>
                    <textarea name="update_comment" id="update_comment" cols="30" rows="3"
                        class="w-full text-sm bg-overlay1 rounded-xl placeholder-white border-none px-4 py-2 focus:outline-none focus:ring focus:ring-maroon "
                        placeholder="Add an update comment (optional)"></textarea>
                </div>
                <div class="flex items-center justify-between space-x-3">
                    <button type="button"
                        class="flex items-center justify-center w-1/2 h-11 text-xs text-maroon bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
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
