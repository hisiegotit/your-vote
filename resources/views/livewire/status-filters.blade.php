<div>
    <nav class="flex items-center justify-between text-xs">
        <ul class="flex uppercase font-semibold space-x-10 border-b-3 pb-3">
            <li><a 
                wire:click.prevent="setStatus('All')"
                href=""
                class="border-b-4 pb-3 @if($status == 'All')
                border-maroon
                text-maroon
                @else
                border-base
                text-subtext0
                @endif">All Ideas ({{ $statusCounter['all_statuses'] }})</a></li>
            <li><a 
                wire:click.prevent="setStatus('Considering')" 
                href=""
                class="transititon duration-150 ease-in border-b-4 pb-3 hover:border-mauve
                @if($status == 'Considering')
                border-mauve
                text-mauve
                @else
                border-base
                text-subtext0
                @endif
                hover:border-b-5">Considering
                ({{ $statusCounter['considering'] }})</a></li>
            <li><a 
                wire:click.prevent="setStatus('In Progress')"
                href=""
                class="transititon duration-150 ease-in border-b-4 pb-3 @if($status == 'In Progress')
                border-yellow
                text-yellow
                @else
                border-base
                text-subtext0
                @endif hover:border-yellow">In
                progess ({{ $statusCounter['in_progress'] }})</a></li>
        </ul>
        <ul class="flex uppercase font-semibold space-x-10 border-b-3 pb-3">
            <li><a 
                wire:click.prevent="setStatus('Implemented')"
                href=""
                class="transititon duration-150 ease-in border-b-4 pb-3 @if($status == 'Implemented')
                border-green
                text-green
                @else
                border-base
                text-subtext0
                @endif hover:border-green hover:border-b-5">Implemented
                ({{ $statusCounter['implemented'] }})</a></li>
            <li><a 
                wire:click.prevent="setStatus('Closed')"
                href=""
                class="transititon duration-150 ease-in border-b-4 pb-3 @if($status == 'Closed')
                border-red
                text-red
                @else
                border-base
                text-subtext0
                @endif hover:border-red hover:border-b-5">Closed
                ({{ $statusCounter['closed'] }})</a></li>
        </ul>
    </nav>
</div>
