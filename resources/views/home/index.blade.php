@extends('layouts.app')
@section('content')

<div class="h-[175vh] dark:text-white text-black flex flex-col overflow-hidden px-[10vw]">
    <div class="min-h-72 h-[40vh] w-screen -mx-[10vw]">
        <img src="/1440x300.svg" alt="">
    </div>
    <div class="min-h-32 h-[20vh] -mb-24">
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
                <div class="flex size-12 justify-center items-center translate-y-3"> <!-- submit -->
                    <i class="fa-solid fa-arrow-up fa-xl absolute -z-10"></i>
                    <input type="submit" value class="size-12 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
    <x-linebreak/>
    <div class="h-[50vh] -mt-4 mb-4">
        <!-- upcoming festivals -->
        <h2 class="pb-8 text-3xl">Upcoming</h2>
        <div class="max-h-[90%] flex flex-row flex-wrap gap-8 justify-center overflow-y-scroll no-scrollbar">
            <!-- needs logic
            foreach ($festivals as $festival)
            
            endforeach
            -->
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
        </div>
    </div>
    <x-linebreak/>
    <div class="h-[50vh] -mt-4 mb-4">
        <!-- festival news -->
        <h2 class="pb-8 text-3xl">Festival News</h2>
        <div class="max-h-[90%] flex flex-row flex-wrap gap-8 justify-center overflow-y-scroll no-scrollbar">
            <!-- needs logic
            foreach ($festivals as $festival)
            
            endforeach
            -->
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
            <x-festival-post/>
        </div>
    </div>
</div>

@endsection