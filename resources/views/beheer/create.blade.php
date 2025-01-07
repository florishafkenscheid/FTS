<x-app-layout>

<div class="h-[85vh]">
    <div class="p-12 flex flex-col gap-8">
        <h2 class="text-3xl font-bold">
            Create new festival
        </h2>
        <form class="w-1/4 flex flex-col gap-2" method="POST" action="{{route('store_festival')}}">
            @csrf
            <input class="rounded-lg text-black" name="name" placeholder="Name" required>
            <textarea class="rounded-lg text-black resize-y" name="description" placeholder="Description" required></textarea>
            <input class="rounded-lg text-black" name="email" placeholder="Contact e-mail" type="email" required>
            <input class="rounded-lg text-black" name="phone" placeholder="Support phone number" type="tel" required>
            <div class="flex size-12 ml-auto items-center z-20 justify-center">
                <x-submit/>
            </div>
        </form>
    </div>
</div>

</x-app-layout>