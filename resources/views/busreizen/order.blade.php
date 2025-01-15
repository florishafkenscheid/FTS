<x-app-layout>
<div class="h-[85vh] overflow-hidden">
    <div class="p-8">
        <div class="flex flex-col gap-4">
            <h1 class="text-4xl">
                {{$trip->departure_from}} &rarr; {{$trip->destination}}
            </h1>
            <h3 class="text-lg -mt-4">
                {{date('F j | H:i', strtotime($trip->departure_scheduled_at))}} &rarr;
                {{date('F j | H:i', strtotime($trip->arrival_scheduled_at))}}
            </h3>
        </div>
        <div class="flex justify-center py-16">
            <form class="flex flex-col gap-12" method="POST" action="{{route('store_order')}}">
                @csrf
                <div class="flex flex-col text-center">
                    <label>Amount of tickets</label>
                    <input type="number" name="ticket_amount" value="1" class="bg-slate-800 rounded-md" min="1" max="{{35 - $trip->bus->passengers}}" step="1"/> 
                    {{-- Race conditions, no back end checking bla bla bla het is buiten de scope :) --}}
                    {{-- Hidden, needed for store request --}}
                    <input name="trip_id" value="{{$trip->id}}" hidden/>
                    <input name="user_id" value="1" hidden/> {{-- waiting on user auth first, then changing value="1" --}}
                </div>
                <input type="submit" value="Order" class="bg-green-400 w-fit p-2 rounded-md ml-auto cursor-pointer">
            </form>
        </div>
    </div>
</div>
</x-app-layout>
