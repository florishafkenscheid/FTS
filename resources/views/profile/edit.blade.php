@extends('layouts.app')
@section('content')

<div class="h-[85vh] w-full">
    <div class="h-1/3 w-full flex flex-row">
        <div class="h-full w-1/2 pl-20 flex items-center">
            <div class="h-40 w-40 border-2 rounded-full">
                <!-- profile picture -->
            </div>
            <div class="flex flex-col m-4 gap-6">
                <div>
                    <div class="flex flex-row items-center gap-4">
                        <h2 class="text-3xl">Name</h2><i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <div class="flex flex-row items-center gap-4">
                        <h3 class="text-base">Email</h3><i class="fa-solid fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="flex flex-row items-center gap-3">
                    <h3>Password</h3><i class="fa-solid fa-pen-to-square"></i>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection