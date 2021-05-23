<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteManager extends Component
{
    public $notes;
    public $selectedNoteId;

    protected $listeners = [
        'refresh' => '$refresh',
        'setSelected'
    ];

    public function setSelected($noteId){
        $this->selectedNoteId = $noteId;
        $this->emitSelf('refresh');
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
            $this->selectedId = $note->id;
        } else {
            $orphanedNote->update([
                'created_at' => now(),
            ]);
            $this->selectedId = $orphanedNote->id;
        }

        $this->emitTo('note-editor', 'loadNote',$this->selectedId);
        $this->emit('refresh');
    }

    public function deleteNote($noteId){
        Note::where([
                'id' => $noteId
                ])
            ->delete();

        if(auth()->user()->countAllNotes() <= 0){
            $this->createBlank();
        }
    }

    public function refreshSelected(){
        $this->notes = auth()->user()->notes()->get();
        $selectedNoteId = $this->notes
        ->sortBy('created_at')
        ->first()
        ->id;
    }

    public function render()
    {
        $this->refreshSelected();
        return view('livewire.note-manager');
    }
}
