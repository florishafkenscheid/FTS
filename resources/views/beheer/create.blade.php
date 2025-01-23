<x-app-layout>

<div class="h-[85vh] overflow-hidden">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="p-12 flex flex-col gap-8 justify-center items-center max-h-full overflow-scroll no-scrollbar">
        <h2 class="text-3xl font-bold">
            Create new festival
        </h2>
        <form class="w-1/4 flex flex-col gap-2" method="POST" action="{{route('store_festival')}}">
            @csrf
            <input class="rounded-lg text-black" name="name" placeholder="Name" required>
            <textarea class="rounded-lg text-black resize-y" name="description" placeholder="Description" required></textarea>
            <input class="rounded-lg text-black" name="email" placeholder="Contact e-mail" type="email" required>
            <input class="rounded-lg text-black" name="phone_number" placeholder="Support phone number" type="tel" required>
            <div class="flex flex-row">
                <div class="flex flex-col w-4/5 gap-2 text-black">
                    <input type="datetime-local" name="start_at" class="rounded-lg">
                    <input type="datetime-local" name="end_at" class="rounded-lg">
                </div>
                <div class="flex size-12 ml-auto my-auto items-center z-20 justify-center">
                    <x-submit/>
                </div>
            </div>
        </form>
    </div>
</div>

</x-app-layout>