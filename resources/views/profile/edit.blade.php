<x-app-layout>

<div class="h-[85vh] w-full">
    <div class="h-1/3 w-full flex flex-row">
        <div class="h-full w-1/2 pl-20 flex items-center">
            <div class="h-40 w-40 border-2 rounded-full">
                <!-- profile picture -->
            </div>
            <div class="flex flex-col h-full p-4 gap-6">
                <div class="h-[85vh] w-full">
                    @livewire('edit-profile')
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>