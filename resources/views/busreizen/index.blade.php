<x-app-layout>
<div class="h-[85vh] overflow-hidden flex flex-row">
    <div class="h-full w-1/3">
        <div class="h-1/6 w-full flex justify-center items-center">
            <h2 class="text-white text-3xl">Upcoming</h2>
        </div>
        <div class="h-5/6 w-full flex flex-col gap-4 items-center overflow-scroll">
            @forelse ($festivals as $festival)
                <x-festival.select :festival="$festival" :selectedFestival="$selected" :admin="false"/>
            @empty
            @endforelse
        </div>
    </div>
    <div class="h-5/6 w-fit flex self-center">
        <x-v-linebreak/>
    </div>
    <div class="h-full w-2/3 p-8">
        @if(isset($selected))
        <div class="h-fit w-full">
            <h2 class="text-4xl">
                {{$selected->name}}
            </h2>
            <h4 class="text-xl">
                {{date('Y-m-d', strtotime($selected->start_at))}}
            </h4>
            <div class="-mt-4 -mb-6">
                <x-h-linebreak/>
            </div>
            @if($trips)
                <div class="flex flex-row justify-between w-5/6">
                    <h3 class="text-2xl">Departure from</h3>
                    <h4 class="text-2xl">Travel time</h4>
                </div>
            @endif
        </div>
        @else
        @endif
        @forelse ($trips as $trip)
            <x-festival.trip :trip="$trip" :festival="$selected"/>
        @empty
        @endforelse
    </div>
</div>

</x-app-layout>