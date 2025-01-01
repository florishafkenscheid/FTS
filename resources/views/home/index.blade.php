@extends('layouts.app')
@section('content')

<div class="h-[200vh] dark:text-white text-black flex flex-col overflow-hidden px-[10vw]">
    <div class="h-[40vh] w-screen -mx-[10vw]">
        <img src="/1440x300.svg" alt="">
    </div>
    <div class="h-[20vh] -mb-24">
        <!-- trip menu -->
        <div class="bg-slate-600 w-full h-4/6 -translate-y-2/3">
            <form>
                <div> <!-- from -->
                    <label>From</label>
                    <input>
                </div>
                <div> <!-- to -->
                    <label>To</label>
                    <input>
                </div>
                <div> <!-- departure -->
                    
                </div>
                <div> <!-- passengers -->
    
                </div>
                <div> <!-- submit -->
    
                </div>
            </form>
        </div>
    </div>
    <x-linebreak/>
    <div class="h-[50vh]">
        <!-- upcoming festivals -->
        s
    </div>
    <x-linebreak/>
    <div class="h-[50vh]">
        <!-- festival news -->
        d
    </div>
</div>

@endsection