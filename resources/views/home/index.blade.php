@extends('layouts.app')
@section('content')

<div class="h-[200vh] dark:text-white text-black flex flex-col overflow-hidden px-[10vw]">
    <div class="h-[40vh] w-screen -mx-[10vw]">
        <img src="/1440x300.svg" alt="">
    </div>
    <div class="h-[20vh] -mb-24">
        <!-- trip menu -->
        <div class="bg-slate-600 w-full h-4/6 -translate-y-2/3">
            <form class="flex h-full px-6 items-center justify-around">
                <div class="flex flex-col -mr-8 w-1/4"> <!-- from -->
                    <label class="px-3">From</label>
                    <input class="bg-slate-400 rounded-md w-11/12">
                </div>
                <div class="flex flex-col w-1/4"> <!-- to -->
                    <label class="px-3">To</label>
                    <input class="bg-slate-400 rounded-md w-11/12">
                </div>
                <div class="flex flex-col ml-12 -mr-8 w-1/5"> <!-- departure -->
                    <label class="px-3">Departure</label>
                    <input class="bg-slate-400 rounded-md w-11/12" type="date">
                </div>
                <div class="flex flex-col w-1/5"> <!-- passengers -->
                    <label class="px-3">Passengers</label>
                    <input class="bg-slate-400 rounded-md w-11/12" type="number" value="0">
                </div>
                <div class="flex size-12 justify-center items-center"> <!-- submit -->
                    <i class="fa-solid fa-arrow-up fa-xl absolute -z-10"></i>
                    <input type="submit" value class="size-12 cursor-pointer">
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