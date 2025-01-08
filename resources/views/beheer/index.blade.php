<x-app-layout>

<div class="h-[85vh] overflow-hidden flex flex-row">
    <div class="h-full w-1/3">
        <div class="h-1/6 w-full flex flex-row justify-center items-center gap-4">
            <h2 class="text-white text-3xl">Upcoming</h2>
            <a href="{{route('create_festival')}}">
                <i class="fa-solid fa-plus fa-xl translate-y-1/4"></i>
            </a>
        </div>
        <div class="h-5/6 w-full flex flex-col gap-4 items-center">
            <!-- logic needed -->
            <x-festival-editor/>
            <x-festival-editor/>
            <x-festival-editor/>
            <x-festival-editor/>
        </div>
    </div>
    <div class="h-5/6 w-fit flex self-center">
        <x-v-linebreak/>
    </div>
    <div class="flex-grow">
        @isset($festival)
        {{$festival}}
        @endisset
    </div>
</div>

</x-app-layout>