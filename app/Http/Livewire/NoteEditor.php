<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteEditor extends Component
{
    public $noteId;
    public $title;
    public $content;

    protected $listeners = [
        'loadNote'
    ];

    public function loadNote($noteId){
        $this->noteId = $noteId;
        $note = Note::find($noteId);
        $this->title = $note->title;
        $this->content = $note->content;
    }

    public function saveNote()
    {
        Note::where('id', $this->noteId)
            ->update([
                'title' => $this->title,
                'content' => $this->content,
            ]);

        $this->emitTo('note-manager','refresh');
    }

    public function render()
    {
        return view('livewire.note-editor');
    }
}
