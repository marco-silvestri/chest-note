<div>
    <div>
        <button type="button" wire:click="createBlank">
            Add a note +
        </button>
    </div>
    @forelse ($notes as $note)
    <div>
        <div class="border border-green-500 p-2 m-2" wire:click="$emit('loadNote', {{$note->id}})">
        <div>
            @empty($note->title)
                written {{$note->created_at->diffForHumans()}}
            @else
            {{$note->title}}
            @endempty
        </div>
        <div>
            @empty($note->content)
            No content
            @else
            {{$note->content}}
            @endempty
        </div>
    </div>
    @empty
        <div>
            There are no notes here...
        </div>
    </div>
    @endforelse
</div>
