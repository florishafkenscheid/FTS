@extends('layouts.app')
@section('content')

<div class="h-[85vh] w-full">
    <div class="h-full w-full flex flex-col justify-center items-center gap-4">
        <h1 class="text-4xl">Contact us!</h1>
        <div class="w-1/4">
            <form class="flex flex-col gap-4">
                <input placeholder="Name" type="text" class="bg-slate-600 placeholder-white rounded-md">
                <input placeholder="Email" type="email" class="bg-slate-600 placeholder-white rounded-md">
                <textarea placeholder="Message" type="text" class="bg-slate-600 placeholder-white resize-none no-scrollbar rounded-md" maxlength="3000" rows="4"></textarea>
                <div class="size-8 ml-auto relative">
                    <i class="fa-solid fa-arrow-up fa-xl absolute translate-y-4 translate-x-2 z-10"></i>
                    <input type="submit" value class="size-8 cursor-pointer relative z-20">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection