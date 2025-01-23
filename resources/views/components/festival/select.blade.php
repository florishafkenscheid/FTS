@php
    $bg = isset($selectedFestival) && $selectedFestival->id == $festival->id ? "800" : "600";
    
    $route = $admin ? ['edit_festival', $festival->id] : ['search_destination_busreizen', $festival->name]
@endphp

<div class="min-h-20 w-72 bg-slate-{{$bg}} rounded-md flex px-4 items-center justify-between">
    <a href="{{route('beheer.show', $festival->id)}}" class="flex-grow flex items-center justify-between h-full">
        <h2 class="text-2xl">{{$festival->name}}</h2>
    </a>
    @if($admin)
    <a href="{{route($route[0], $route[1])}}" class="ml-4"><i class="fa-solid fa-pen fa-xl"></i></a>
    @endif
</div>