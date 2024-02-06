

<x-mail::message>
    {{ $comment->user->name }} posted a comment on **{{ $comment->idea->title }}**

    Comment: {{ $comment->body }}

<x-mail::button :url="route('idea.show', $comment->idea)">
View idea
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
