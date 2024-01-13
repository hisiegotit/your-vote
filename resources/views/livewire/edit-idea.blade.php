<div
    x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @edit-modal.window="isOpen=true"
    x-init="() => {
        Livewire.on('ideaWasUpdated', () => {
            isOpen = false;
        });
    }"
    class="relative z-10"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div
        x-show="isOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
    </div>
  
    <div
        x-show="isOpen"
        x-transition:enter="ease-out duration-300 transform transition-all"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-8"
        x-transition:enter-end="opacity-100 translate-y-0 sm:translate-y-0"
        x-transition:leave="ease-in duration-200 transform transition-all"
        x-transition:leave-start="opacity-100 translate-y-0 sm:translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-8"
        
        class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center">
        <div class="border-2 border-maroon border-b-0 modal relative transform overflow-hidden rounded-tl-xl rounded-tr-xl bg-surface0 transition-all py-2 sm:w-full sm:max-w-lg">
            <div
                @click="isOpen = false"
                type="button"
                class="btn flex justify-center align-center border-b-2 rounded-xl border-surface0 transition duration-200 ease-in hover:border-maroon cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 pb-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                </svg>                  
            </div>
          <div class="bg-surface0 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <h3 class="text-center text-xl font-medium text-white">Edit Idea</h3>
            <p class="text-xs text-center mt-4 text-text">
                Bro, having one hour to edit your idea from its inception.
            </p>
            <form wire:submit.prevent="updateIdea" action="#" method="PUT" class="space-y-4 px-4 py-6">
                <div>
                    <input
                        wire:model="title"
                        type="text"
                        class="w-full bg-surface1 border-none text-sm text-white rounded-xl placeholder-subtext0 px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                        placeholder="Your idea">
                    <p>
                        @error('title')
                            <span class="text-red text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div>
                    <select wire:model="category" name="add_category" id="add_category"
                        class="w-full bg-surface1 border-none text-sm text-white rounded-xl focus:outline-none focus:ring focus:ring-maroon px-4 py-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    <p>
                        @error('category')
                            <span class="text-red text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </p>
                </div>
                <div>
                    <textarea wire:model="description" name="idea" id="idea" cols="30" rows="10"
                        class="border-none w-full bg-surface1 rounded-xl placeholder-subtext0 text-sm text-white px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                        placeholder="Describe your idea"></textarea>
                    <p>
                        @error('description')
                            <span class="text-red text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </p>
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
                    <button type="submit"
                        class="flex items-center justify-center w-1/2 h-11 text-xs text-surface1 bg-maroon font-semibold rounded-xl border border-maroon hover:border-surface1 transition duration-150 ease-in px-6 py-3">
                        <path
                            d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                        </svg>
                        <span class="ml-1">Update</span>
                    </button>
                </div>
            
                @if (session('success'))
                        <div
                            x-data="{ isVisible: true }"
                            x-init="
                                setTimeout(() => {
                                    isVisible = false
                                }, 3000)
                            "
                            x-show.transition.duration.1000ms="isVisible"
                            class="text-green mt-4 text-center">
                            {{ session('success') }}
                        </div>
                    @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  