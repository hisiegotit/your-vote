<x-app-layout>
    <x-slot name="title">
        {{ $idea->title }} | Your Votes
    </x-slot>
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

<livewire:show-idea :idea="$idea" :votes="$votes"/>

<livewire:idea-comments :idea="$idea"/>

<x-success-notification />

<x-modals-container :idea="$idea"/>

</x-app-layout>