<div>
    @forelse ($notes as $note)
        <div>
            {{$note->title}}
        </div>
        <div>
            {{$note->content}}
        </div>
    @empty
        <div>
            There are no notes here...
        </div>
    @endforelse
</div>
