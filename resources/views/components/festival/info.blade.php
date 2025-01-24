@if(isset($festival))

<div class="p-12 flex flex-col gap-8">
    <div>
        <div class="flex flex-row justify-between">
            <h1 class="text-3xl font-bold">
                {{$festival->name}} ({{$festival->id}})
            </h1>
            <form action="{{ route('festivals.destroy', $festival->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-20 h-8 bg-red-400 rounded-md hover:bg-red-500" 
                    onclick="return confirm('Are you sure you want to delete {{ $festival->name }}?')">
                    Delete
                </button>
            </form>
        </div>
        <h2>
            {{$festival->start_at}}
            &rarr;
            {{$festival->end_at}}
        </h2>
        <h3>
            Description: {{$festival->description}}
        </h3>
        <h4>
            Attendees:
            {{$festival->attendees}}
        </h4>
    </div>
    <div class="flex flex-col gap-4">
        <h1 class="text-3xl">Trips</h1>
        @forelse ($festival->trips as $trip)
        <div>
        <h2 class="text-xl">
            {{$trip->departure_from}}
        </h2>
        <h3>
            {{$trip->departure_scheduled_at}}
            &rarr;
            {{$trip->arrival_scheduled_at}}
        </h3>
        ${{$trip->price}}
        </div>
        @empty
        @endforelse
    </div>
</div>

@endif