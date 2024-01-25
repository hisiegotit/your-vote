@props([
    'redirect' => false,
    'messageToDisplay' =>  ''
    ])

<div
    x-cloak
    x-data="{
        isOpen: false,
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
                showNotification(message);
            });

            Livewire.on('ideaWasMarkedAsSpam', message => {
                showNotification(message);
            });

            Livewire.on('ideaWasNotASpam', message => {
                showNotification(message)
            });

            Livewire.on('commentWasPosted', message => {
                showNotification(message)
            });

            Livewire.on('commentWasUpdated', message => {
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
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <div class="ml-2" x-text="messageToDisplay"></div>
    </div>
    <button @click="isOpen = false" class="text-surface0 hover:text-white">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>
    </button>
</div>