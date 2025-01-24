<x-app-layout>

<div class="h-[175vh] dark:text-white text-black flex flex-col overflow-hidden px-[10vw]">
    <div class="min-h-72 h-[40vh] w-screen -mx-[10vw]">
        <img src="/1440x300.svg" alt="">
    </div>
    <div class="min-h-32 h-[20vh] -mb-24">
        <!-- trip menu -->
        <div class="bg-slate-600 w-full h-2/3 -translate-y-2/3 rounded-md">
            <form class="flex h-full px-6 items-center justify-around" method="GET" action="{{route('search_busreizen')}}">
                <div class="flex flex-col -mr-8 w-1/4">
                    <label class="px-3">From</label>
                    <input class="bg-slate-400 rounded-md w-11/12" 
                        name="origin" 
                        list="origins" 
                        autocomplete="off"
                        required>
                    <datalist id="origins">
                        @foreach($trips->pluck('departure_from')->unique()->sort() as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="flex flex-col w-1/4">
                    <label class="px-3">To</label>
                    <input class="bg-slate-400 rounded-md w-11/12" 
                        name="destination" 
                        list="destinations"
                        autocomplete="off"
                        required>
                    <datalist id="destinations">
                        @foreach($trips->pluck('destination')->unique()->sort() as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="flex flex-col ml-12 -mr-8 w-1/5">
                    <label class="px-3">Departure</label>
                    <input class="bg-slate-400 rounded-md w-11/12" 
                        type="date" 
                        name="date" 
                        id="date" 
                        min="{{ now()->format('Y-m-d') }}"
                        max="{{ now()->addMonths(6)->format('Y-m-d') }}"
                        required>
                </div>
                <div class="flex flex-col w-1/5"> <!-- passengers -->
                    <label class="px-3">Passengers</label>
                    <input class="bg-slate-400 rounded-md w-11/12" type="number" value="1" min="1" step="1" name="passengers" required>
                </div>
                <div class="flex size-12 justify-center items-center translate-y-3"> <!-- submit -->
                    <x-submit/>
                </div>
            </form>
        </div>
    </div>
    <x-h-linebreak/>
    <div class="h-[50vh] -mt-4 mb-4">
        <!-- upcoming festivals -->
        <h2 class="pb-8 text-3xl">Upcoming</h2>
        <div class="max-h-[90%] flex flex-row flex-wrap gap-8 justify-center overflow-y-scroll no-scrollbar">
            @forelse ($festivals as $festival)
                <x-festival.upcoming :festival="$festival"/>
            @empty
            @endforelse
        </div>
    </div>
    <x-h-linebreak/>
    <div class="h-[50vh] -mt-4 mb-4">
        <!-- festival news -->
        <h2 class="pb-8 text-3xl">Festival News</h2>
        <div class="max-h-[90%] flex flex-row flex-wrap gap-8 justify-center overflow-y-scroll no-scrollbar">
            @forelse ($news as $festivalNews)
                <x-festival.news :festivalNews="$festivalNews"/>
            @empty
            @endforelse
        </div>
    </div>
</div>

</x-app-layout>