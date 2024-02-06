@props([
    'type' => 'success',
    'redirect' => false,
    'messageToDisplay' =>  ''
    ])

<div
    x-cloak
    x-data="{
        isOpen: false,
        isError: @if ($type === 'success') false @elseif ($type === 'error') true @endif,
        messageToDisplay: '{{ $messageToDisplay }}',
        showNotification(message){
            this.isOpen = true
            this.messageToDisplay = message
            setTimeout(() => {
                isOpen = false
            }, 5000)      
        }
    }"
    x-init="() => {
        @if($redirect)
            $nextTick(() => showNotification(messageToDisplay)) 
        @else
            Livewire.on('ideaWasUpdated', message => {
                isError = false
                showNotification(message);
            });

            Livewire.on('ideaWasMarkedAsSpam', message => {
                isError = false
                showNotification(message);
            });

            Livewire.on('ideaWasNotASpam', message => {
                isError = false
                showNotification(message)
            });

            Livewire.on('statusWasUpdated', message => {
                isError = false
                showNotification(message)
            })
            Livewire.on('statusWasUpdatedError', message => {
                isError = true
                showNotification(message)
            })

            Livewire.on('commentWasPosted', message => {
                isError = false
                showNotification(message)
            });

            Livewire.on('commentWasUpdated', message => {
                isError = false
                showNotification(message)
            })

            Livewire.on('commentWasDeleted', message => {
                isError = false
                showNotification(message)
            })

            Livewire.on('commentWasMarkedAsSpam', message => {
                isError = false
                showNotification(message)
            })
            Livewire.on('commentWasMarkedAsNotSpam', message => {
                isError = false
                showNotification(message)
            })
        @endif

    }"
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-300 transform"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"

    @keydown.escape.window="isOpen = false"
    
    class="z-20 max-w-sm w-full flex justify-between fixed bottom-0 right-0 bg-green text-surface0 rounded-xl shadow-lg  px-6 py-5 mx-6 my-8">  
    <div class="flex items-center font-semibold text-surface0 text-base">
        <svg x-show="!isError" class="text-green h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <svg x-show="isError" class="text-red h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="ml-2" x-text="messageToDisplay"></div>
    </div>
    <button @click="isOpen = false" class="text-surface0 hover:text-white">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>
    </button>
</div>