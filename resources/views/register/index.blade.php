<x-app-layout>

<div class="h-[85vh] w-full overflow-hidden flex justify-center items-center">
    <div class="bg-slate-600 h-5/6 w-2/3 rounded-md flex flex-row">
        <div class="w-1/2 h-full flex items-center justify-end">
            <div class="bg-white h-[90%] w-[95%] rounded-lg">
            </div>
        </div>
        <div class="w-1/2 h-full flex items-center justify-center">
            <div class="px-8 py-16 h-full flex flex-col gap-4">
                <div class="flex flex-col">
                    <h2 class="text-4xl">Create an account</h2>
                    <h4>Already have an account? <a href="{{route('login')}}" class="text-blue-400">Log in</a></h4>
                </div>
                <form class="flex flex-col gap-8" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="flex flex-col gap-2">
                        {{-- Name --}}
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Email address --}}
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            {{-- Confirm password --}}
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <x-primary-button class="w-1/3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>