<div>
    <div class="bg-gray-300 px-8 text-xl font-bold">
        <button class="eflex space-between" type="button" wire:click="createBlank">
            Add a note
            <span class="material-icons">
                add_circle_outline
                </span>
        </button>
    </div>
    @forelse ($notes as $note)
    <div>
        <div class="border border-green-500 p-2 m-2 flex" wire:click="$emit('loadNote', {{$note->id}})">
        <div>
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
        <div>
            <button wire:click="deleteNote({{$note->id}})" type="button">
                X
            </button>
        </div>
    </div>
    @empty
        <div>
            There are no notes here...
        </div>
    </div>
    @endforelse
</div>
