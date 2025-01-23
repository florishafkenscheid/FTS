<x-app-layout>

<div class="h-[85vh] flex justify-center items-center overflow-hidden">
    <form class="flex flex-col gap-4 w-1/4 max-h-full overflow-scroll no-scrollbar" method="POST" action="{{route('update_festival', $festival->id)}}">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{$festival->id}}">
        <div class="flex flex-col">
            <label>Name</label>
            <input name="name" class="rounded-md text-black" placeholder="{{$festival->name}}" required>
        </div>
        <div class="flex flex-col">
            <label>Description</label>
            <textarea name="description" class="rounded-md resize-y overflow-scroll text-black" placeholder="{{$festival->description}}" required></textarea>
        </div>
        <div class="flex flex-col">
            <label>Email</label>
            <input name="email" class="rounded-md text-black" placeholder="{{$festival->email}}" required>
        </div>
        <div class="flex flex-col">
            <label>Support phone number</label>
            <input name="phone_number" class="rounded-md text-black" placeholder="{{$festival->phone_number}}" required>
        </div>
        <div class="flex flex-col w-4/5 gap-2 text-black">
            <label class="text-white">Start & end</label>
            <input type="datetime-local" name="start_at" class="rounded-lg" value="{{$festival->start_at}}" required>
            <input type="datetime-local" name="end_at" class="rounded-lg" value="{{$festival->end_at}}" required>
        </div>
        <div class="flex size-12 ml-auto items-center z-20 justify-center">
            <x-submit/>
        </div>
    </form>
</div>

</x-app-layout>