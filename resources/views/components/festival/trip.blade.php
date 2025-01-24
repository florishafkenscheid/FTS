<div class="flex flex-col py-2">
    <div class="flex flex-row">
        <div class="flex flex-row justify-between w-5/6">
            <h3>{{$trip->departure_from}}</h3>
            <h4>
                {{date('m-d | H:i:s', strtotime($trip->departure_scheduled_at))}}
            </h4>
        </div>
        <div class="flex justify-center items-center mx-4">
            <a class="cursor-pointer" href="{{route('order_busreis', $trip->id)}}">
                <i class="fa-solid fa-ticket fa-xl"></i>
            </a>
        </div>
    </div>
</div>