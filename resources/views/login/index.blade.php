@extends('layouts.app')
@section('content')

<div class="h-[85vh] w-full overflow-hidden flex justify-center items-center">
    <div class="bg-slate-600 h-5/6 w-2/3 rounded-md flex flex-row">
        <div class="w-1/2 h-full flex items-center justify-end">
            <div class="bg-white h-[90%] w-[95%] rounded-lg">
            </div>
        </div>
        <div class="w-1/2 h-full flex items-center justify-center">
            <div class="w-full px-8 py-16 h-full flex flex-col gap-20">
                <div class="flex flex-col">
                    <h2 class="text-4xl">Log in</h2>
                    <h4>Don't have an account? <a href="/register" class="text-blue-400">Register</a></h4>
                </div>
                <form class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <input id="email" type="email" placeholder="Email"
                        class="rounded-lg text-black" required>
                        <input id="password" type="password" placeholder="Enter your password"
                        class="rounded-lg text-black" required>
                    </div>
                    <input id="submit" type="submit" value="Log in"
                    class="h-fit w-full rounded-lg bg-slate-600 cursor-pointer">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection