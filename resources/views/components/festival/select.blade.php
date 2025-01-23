@php
    $bg = isset($selectedFestival) && $selectedFestival->name == $festival->name ? "800" : "600";
    
    $route = $admin ? ['edit_festival', $festival->id] : ['search_destination_busreizen', $festival->name]
@endphp

<a href="{{route($route[0], $route[1])}}">
    <div class="min-h-20 w-72 bg-slate-{{$bg}} rounded-md flex pl-4 items-center">
        <h2 class="text-2xl">{{$festival->name}}</h2>
    </div>
</a>