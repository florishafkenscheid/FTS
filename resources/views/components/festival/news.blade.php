<div class="h-40 w-72 bg-slate-600 relative">
    <div class="h-1/4 absolute">
        <img src="/288x40.svg"/>
    </div>
    <div class="p-2 h-1/4 absolute top-1/4">
        <h2 class="text-lg font-medium">{{$festivalNews->title}}</h2>
    </div>
    <div class="h-1/2 overflow-hidden absolute top-1/2">
        <p class="p-2 line-clamp-3 text-ellipsis">{{$festivalNews->content}}</p>
    </div>
</div>