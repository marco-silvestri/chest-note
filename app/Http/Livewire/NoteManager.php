<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteManager extends Component
{
    public function createBlank()
    {
        $orphanedNote = Note::query()
            ->where('user_id','')
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
