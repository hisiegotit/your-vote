@can('update', $idea)
<livewire:edit-idea :idea="$idea"/>
@endcan

@can('delete', $idea)
<livewire:delete-idea :idea="$idea"/>
@endcan

@auth
    <livewire:spam-idea :idea="$idea"/>
@endauth

@admin
    <livewire:not-spam-idea :idea="$idea"/>
@endadmin

@auth
    <livewire:edit-comment />
@endauth