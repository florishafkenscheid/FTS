<x-app-layout>

<div class="h-[85vh] flex justify-center items-center overflow-hidden">
    <form class="flex flex-col gap-4 w-1/4 max-h-full overflow-scroll no-scrollbar" method="POST" action="{{route('update_festival', $festival->id)}}">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$festival->id}}">
        <div class="flex flex-col">
            <label>Name</label>
            <input name="name" class="rounded-md text-black" placeholder="{{$festival->name}}">
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea name="description" class="rounded-md resize-y overflow-scroll text-black" placeholder="{{$festival->description}}"></textarea>
        </div>
        <div class="flex flex-col">
            <label>Email</label>
            <input name="email" class="rounded-md text-black" placeholder="{{$festival->email}}">
        </div>
        <div class="flex flex-col">
            <label>Support phone number</label>
            <input name="phone_number" class="rounded-md text-black" placeholder="{{$festival->phone_number}}">
        </div>
        <div class="flex size-12 ml-auto items-center z-20 justify-center">
            <x-submit/>
        </div>
    </form>
</div>

</x-app-layout>