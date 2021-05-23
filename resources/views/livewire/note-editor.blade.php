<div class="p-8 flex flex-col h-full" wire:ignore>
    <div>
        <label class="block font-xl font-bold" for="note-title">
            Title
        </label>
        <input id="note-title" name="note-title" type="text" wire:model="title">
    </div>
    <div class="h-full">
        <label class="block font-xl font-bold" for="note-content">
            Content
        </label>
        <input id="note-content" type="hidden"/>
        <trix-editor input="note-content" wire:model="content" />
    </div>
        <div class="p-4 text-center">
            <button class="bg-green-500 px-8 py-4 text-center" type="button" wire:click="saveNote">
                Save
            </button>
        </div>
</div>
