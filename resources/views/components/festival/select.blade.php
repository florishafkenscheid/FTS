@php
    $bg = isset($selectedFestival) && $selectedFestival->name == $festival->name ? "800" : "600";
@endphp
<a href="{{route('search_destination_busreizen', $festival->name)}}">
    <div class="min-h-20 w-72 bg-slate-{{$bg}} rounded-md flex pl-4 items-center">
        <h2 class="text-2xl">{{$festival->name}}</h2>
    </div>
</a>