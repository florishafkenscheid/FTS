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
                <div class="flex size-12 ml-auto items-center z-20 justify-center">
                    <x-submit/>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection