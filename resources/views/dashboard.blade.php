<x-app-layout>
    <div class="h-screen flex overflow-hidden bg-gray-100">
        <!-- Static sidebar for desktop -->
        <div class="flex w-1/3">
            <div class="flex flex-col w-full">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col h-0 flex-1">
                    <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-200">
                        <img class="h-12 w-auto"
                            src="{{asset('img/chestnote_icon.svg')}}"
                            alt="Chestnut by tulpahn from the Noun Project">
                    </div>
                    <div class="flex flex-col overflow-y-auto">
                        <nav class="bg-gray-200 space-y-1 h-screen">

                            <livewire:note-manager />

                         </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-2/3 flex-1 overflow-hidden">
            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <livewire:note-editor />
            </main>
        </div>
    </div>
</x-app-layout>
