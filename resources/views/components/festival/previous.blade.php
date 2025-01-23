<div class="flex h-6 w-full my-8 px-8 flex-row justify-between">
    <h3>{{$festival->name}}</h3>
    <h3>{{
        date('m-d', strtotime($festival->start_at))
    }} 
    &rarr; 
    {{
        date('m-d', strtotime($festival->end_at))
        }}</h3>
</div>
<div class="-m-[3vh]">
    <x-h-linebreak/>
</div>