<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteManager extends Component
{
    public $notes;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount(){
        $this->notes = auth()->user()->notes;
        $this->emitTo('note-editor', 'loadNote',
                    $this->notes
                        ->sortBy('created_at')
                        ->first()
                        ->id);
    }

    public function createBlank()
    {
        $orphanedNote = Note::query()
            ->where('user_id', auth()->id())
            ->where('title','')
            ->where('content', '')
            ->first();

        if (!$orphanedNote){
            $note = Note::create([
                'user_id' => auth()->id(),
                'title' => '',
                'content' => '',
            ]);
            return $note;
        } else {
            $orphanedNote->update([
                'created_at' => now(),
            ]);

            return Note::find($orphanedNote->id);
        }
    }

    public function render()
    {
        return view('livewire.note-manager');
    }
}
