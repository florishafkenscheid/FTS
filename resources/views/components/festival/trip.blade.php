<div class="flex flex-col py-2 w-5/6">
    <div class="flex flex-row justify-between">
        <h3>{{$trip->departure_from}}</h3>
        <h4>
            {{date('H:i:s', strtotime($trip->departure_scheduled_at))}}
            -
            {{date('H:i:s', strtotime($trip->arrival_scheduled_at))}}
        </h4>
    </div>
</div>