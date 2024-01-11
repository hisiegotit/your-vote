<x-mail::message>
# Idea Status

The idea {{ $idea->title }} has been updated to {{ $idea->status->name }}

<x-mail::button :url="$url">
View idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
