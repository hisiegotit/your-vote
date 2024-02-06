<div
    x-data="{ isOpen: false }"
    class="relative"
    x-init="() => {
    Livewire.on('commentWasPosted', () => {
        isOpen = false
        window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: 'smooth' })
    })

    @if (session('scrollToComment'))
    const commentToScrollTo = document.querySelector('#comment-{{ session('scrollToComment') }}')
    commentToScrollTo.scrollIntoView({ behavior: 'smooth'})
    commentToScrollTo.classList.add('bg-green-50')
    setTimeout(() => {
        commentToScrollTo.classList.remove('bg-green-50')
    }, 5000)
@endif
}"
    >
    <button
        @click="
            isOpen = !isOpen
            if (isOpen) {
                $nextTick(() => $refs.comment.focus())
            }"
        type="button"
        class="flex items-center justify-center h-11 w-32 text-xs text-base bg-maroon text-surface1 font-semibold rounded-xl border border-maroon hover:border-overlay0  transition duration-150 ease-in px-6 py-3">
    <path fill-rule="evenodd"
        d="M4.804 21.644A6.707 6.707 0 006 21.75a6.721 6.721 0 003.583-1.029c.774.182 1.584.279 2.417.279 5.322 0 9.75-3.97 9.75-9 0-5.03-4.428-9-9.75-9s-9.75 3.97-9.75 9c0 2.409 1.025 4.587 2.674 6.192.232.226.277.428.254.543a3.73 3.73 0 01-.814 1.686.75.75 0 00.44 1.223zM8.25 10.875a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25zM10.875 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875-1.125a1.125 1.125 0 100 2.25 1.125 1.125 0 000-2.25z"
        clip-rule="evenodd" />
    </svg>
    <span class="ml-1">Reply</span>
    </button>
    @auth
    <div
    x-cloak
    x-show = "isOpen"
    @click.away="isOpen = false"
        class="absolute z-10 w-104 text-left font-semibold text-sm bg-surface1 shadow-dialog rounded-xl mt-2">
        <form wire:submit="postComment" action="#" class="space-y-4 px-4 py-6" >
            <div>
                <textarea
                    x-ref="comment"
                    wire:model.live="comment"
                    name="post_comment"
                    id="post_comment"
                    cols="30"
                    rows="4"
                    class="w-full text-sm bg-overlay1 rounded-xl placeholder-white border-none px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                    placeholder="Go ahead. Share your thoughts..."></textarea>
                @error('comment')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center space-x-3">
                <button type="submits"
                    class="flex items-center justify-center h-11 w-1/2 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                    <span>Post Comment</span>
                </button>
                <button type="button"
                    class="flex items-center justify-center w-1/2 h-11 text-xs text-maroon bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-5">
                        <path fill-rule="evenodd"
                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-1">Attach</span>
                </button>
            </div>
        </form>
    </div>
    @else
    <div
    x-cloak
    x-show = "isOpen"
    @click.away="isOpen = false"
        class="absolute z-10 w-104 text-left font-semibold text-sm bg-surface1 shadow-dialog rounded-xl mt-2">
            <div class="space-y-4 px-4 py-6">
                <div class="text-center">Please login or create an account to leave a comment.</div>
            
            <div class="flex items-center space-x-3 justify-center">
                <a
                wire:click.prevent="redirectToLogin"
                href="{{ route('login') }}"
                class="flex items-center justify-center h-11  text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                    <span>Login</span>
                </a>
                <a
                wire:click.prevent="redirectToRegister"
                href="{{ route('register') }}"
                class="flex items-center justify-center  h-11 text-xs text-maroon bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Create new account</span>
                </a>
            </div>
        </div>
    </div>
    @endauth

</div>