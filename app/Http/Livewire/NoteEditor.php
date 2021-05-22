<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteEditor extends Component
{
    public $noteId;
    public $title;
    public $content;

    public function saveNote()
    {

    }

    public function render()
    {
        return view('livewire.note-editor');
    }
}
