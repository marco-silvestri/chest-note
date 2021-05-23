<div class="p-8 flex flex-col h-full w-full">
    <label class="block font-xl font-bold" for="note-title">
        Title
    </label>
    <input id="note-title" name="note-title" type="text" wire:model="title">
        <label class="font-bold block" for="text-editor">
            Content
        </label>
        <textarea class="h-full" wire:model="content"></textarea>
</div>
