<x-app-layout>

<div class="h-[85vh] w-full overflow-hidden flex justify-center items-center">
    <div class="bg-slate-600 h-5/6 w-2/3 rounded-md flex flex-row">
        <div class="w-1/2 h-full flex items-center justify-end">
            <div class="bg-white h-[90%] w-[95%] rounded-lg">
            </div>
        </div>
        <div class="w-1/2 h-full flex items-center justify-center">
            <div class="w-full px-8 py-16 h-full flex flex-col gap-12">
                <div class="flex flex-col">
                    <h2 class="text-4xl">Log in</h2>
                    <h4>Don't have an account? <a href="/register" class="text-blue-400">Register</a></h4>
                </div>
                <form class="flex flex-col gap-8" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="flex flex-col gap-2">
                        {{-- Email address --}}
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')"/>

                        {{-- Password --}}
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input id="password" type="password" name="password" required autocomplete="current-password"/>
                        <x-input-error :messages="$errors->get('password')"/>
                        
                        {{-- Remember me --}}
                        <div class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </div>
                    </div>
                    <x-primary-button class="ms-3 w-1/5">
                        {{ __('Log in') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>