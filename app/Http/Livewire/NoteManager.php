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
        $this->notes = auth()->user()->notes()->get();
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

            $this->emitSelf('refresh');
            return Note::find($orphanedNote->id);
        }
    }

    public function deleteNote($noteId){
        Note::where([
                'id' => $noteId
                ])
            ->delete();

        if(auth()->user()->countAllNotes() <= 0){
            $this->createBlank();
        }

        $this->emit('refresh');

    }

    public function render()
    {
        return view('livewire.note-manager');
    }
}
