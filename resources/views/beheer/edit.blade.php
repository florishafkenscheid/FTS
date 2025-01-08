<x-app-layout>

<?php
$festival = [
    'id' => 1,
    'name' => 'Deichbrand',
    'description' => 'Lorem ipsum........',
    'email' => 'floris@hafkenscheid.com',
    'phone' => '0639778082',
]
?>

<div class="h-[85vh] flex justify-center items-center overflow-hidden">
    <form class="flex flex-col gap-4 w-1/4" method="POST" action="{{route('update_festival', $festival['id'])}}">
        @csrf
        @method('patch')
        <div class="flex flex-col">
            <label>Name</label>
            <input name="name" class="rounded-md text-black" placeholder="{{$festival['name']}}">
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea name="description" class="rounded-md resize-y overflow-scroll text-black" placeholder="{{$festival['description']}}"></textarea>
        </div>
        <div class="flex flex-col">
            <label>Email</label>
            <input name="email" class="rounded-md text-black" placeholder="{{$festival['email']}}">
        </div>
        <div class="flex flex-col">
            <label>Support phone number</label>
            <input name="phone" class="rounded-md text-black" placeholder="{{$festival['phone']}}">
        </div>
        <div class="flex size-12 ml-auto items-center z-20 justify-center">
            <x-submit/>
        </div>
    </form>
</div>

</x-app-layout>