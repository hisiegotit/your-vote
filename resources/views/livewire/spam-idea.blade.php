<div
    x-cloak
    x-data="{ isOpen: false }"
    x-show="isOpen"
    @keydown.escape.window="isOpen = false"
    @spam-modal.window="
        isOpen = true
        $nextTick(() => $refs.confirmButton.focus())
    "
    x-init="() => {
        Livewire.on('ideaWasMarkedAsSpam', () => {
            isOpen = false;
        });
    }"
    class="fixed z-10 inset-0 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div 
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-surface0 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full  sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <svg class="h-6 w-6 text-red" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                            Mark idea as spam
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-text">
                                Are you sure you want to mark this idea as spam? We will review this idea and take action if necessary.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-surface0 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button 
                    wire:click="markAsSpam" 
                    x-ref="confirmButton"
                    type="button" 
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red text-base font-medium text-white hover:bg-blue-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red sm:ml-3 sm:w-auto sm:text-sm">
                    Mark as spam
                </button>
                <button 
                    @click="isOpen = false" 
                    type="button" 
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-surface1 shadow-sm px-4 py-2 bg-surface1 text-base font-medium text-white hover:bg-surface1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm hover:border-">
                    Cancel
                </button>
            </div>
        </div>
        </div>
</div>