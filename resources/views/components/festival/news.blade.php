<div class="h-fit w-72 bg-slate-600 relative" id="container">
    <div class="h-1/4">
        <img src="/288x40.svg"/>
    </div>
    <div class="p-2 h-8">
        <h2 class="absolute text-lg font-medium">{{$festivalNews->title}}</h2>
    </div>
    <div class="overflow-hidden cursor-pointer transition-all duration-300" id="collapsible">
        <p class="p-2 -pb-2 text-ellipsis line-clamp-3 leading-7">{{$festivalNews->content}}</p>
    </div>
</div>