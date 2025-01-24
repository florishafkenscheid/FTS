<x-app-layout>

<div class="h-[85vh] w-full">
    <div class="h-full w-full flex flex-col justify-center items-center gap-4">
        <h1 class="text-4xl">Contact us!</h1>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        <div class="w-1/4">
            <form class="flex flex-col gap-4" method="POST" action="{{ route('contact.store') }}">
                @csrf
                <input placeholder="Name" type="text" name="name" 
                    class="bg-slate-600 placeholder-white rounded-md @error('name') border-red-500 @enderror" 
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input placeholder="Email" type="email" name="email" 
                    class="bg-slate-600 placeholder-white rounded-md @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <textarea placeholder="Message" name="message" 
                    class="bg-slate-600 placeholder-white resize-none no-scrollbar rounded-md @error('message') border-red-500 @enderror" 
                    maxlength="3000" rows="4">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <div class="flex size-12 ml-auto items-center z-20 justify-center">
                    <x-submit/>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>