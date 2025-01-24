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
            <form class="flex flex-col gap-6" method="POST" action="{{route('store_order')}}">
                @csrf
                <div class="flex flex-col text-center">
                    <label>Amount of tickets</label>
                    <input type="number" name="amount_of_tickets" id="ticket_amount" value="1" 
                        class="bg-slate-800 rounded-md" 
                        min="1" 
                        max="{{35 - $trip->bus->passengers}}" 
                        step="1" 
                        oninput="updatePrice()" required/> 
                    {{-- Race conditions, no back end checking bla bla bla het is buiten de scope :) --}}
                    <div>
                        <h4 class="bg-slate-800 rounded-md mt-4 p-2 pl-2 text-left">Subtotal: <span class="text-green-400" id="subtotal">{{$trip->price}}</span></h4>
                    </div>
                    {{-- Hidden, needed for store request --}}
                    <input name="trip_id" value="{{$trip->id}}" hidden/>
                    <input name="user_id" value="{{Auth::user()->id}}" hidden/>
                </div>
                <div class="flex flex-col items-center gap-4">
                    <div class="flex flex-row items-center gap-2">
                        <input type="hidden" name="use_points" value="0"> {{-- Fallback when unchecked --}}
                        <input type="checkbox" name="use_points" value="1" id="points" class="rounded" onclick="updatePrice()" {{ old('use_points') ? 'checked' : '' }}>
                        <p id="points_display">Use points ({{Auth::user()->points}})</p>
                    </div>
                    <input type="submit" value="Order" class="bg-green-400 w-fit p-2 rounded-md cursor-pointer">
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        updatePrice();
    });

    function updatePrice() {
        let ticketAmount = parseInt(document.getElementById('ticket_amount').value) || 1;
        let isUsingPoints = document.getElementById('points').checked;
        let basePrice = {{$trip->price}};
        let discount = isUsingPoints ? 0.8 : 1;
        let subtotal = basePrice * ticketAmount * discount;

        let pointsNeeded = Math.round(basePrice * ticketAmount);
        document.getElementById('points_display').innerHTML = `Use ${pointsNeeded} points? ({{Auth::user()->points}})`;
        document.getElementById('subtotal').innerHTML = subtotal.toFixed(2);
    }
</script>