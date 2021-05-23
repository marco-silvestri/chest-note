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
        'loadNote',
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->noteId = Note::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first()
            ->id;

        $this->loadNote($this->noteId);
    }

    public function updatedContent($value)
    {
        Note::where('id', $this->noteId)
            ->update([
                'content' => $this->content,
            ]);
        $this->emitTo('note-manager', 'refresh');
    }

    public function updatedTitle($value)
    {
        Note::where('id', $this->noteId)
            ->update([
                'title' => $this->title,
            ]);
        $this->emitTo('note-manager', 'refresh');
    }

    public function loadNote($noteId)
    {
        $this->noteId = $noteId;
        $note = Note::find($noteId);
        $this->title = $note->title;
        $this->content = $note->content;
        $this->emitTo('note-manager', 'setSelected', $noteId);
    }

    public function render()
    {
        return view('livewire.note-editor');
    }
}
