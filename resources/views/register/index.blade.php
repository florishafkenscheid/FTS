<x-app-layout>

<div class="h-[85vh] w-full overflow-hidden flex justify-center items-center">
    <div class="bg-slate-600 h-5/6 w-2/3 rounded-md flex flex-row">
        <div class="w-1/2 h-full flex items-center justify-end">
            <div class="bg-white h-[90%] w-[95%] rounded-lg">
            </div>
        </div>
        <div class="w-1/2 h-full flex items-center justify-center">
            <div class="px-8 py-16 h-full flex flex-col gap-20">
                <div class="flex flex-col">
                    <h2 class="text-4xl">Create an account</h2>
                    <h4>Already have an account? <a href="/login" class="text-blue-400">Log in</a></h4>
                </div>
                <form class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-row gap-2">
                            <input id="fname" placeholder="First name" 
                            class="rounded-lg w-3/6 text-black" required>
                            <input id="lname" placeholder="Last name" 
                            class="rounded-lg w-3/6 text-black" required>
                        </div>
                        <input id="email" type="email" placeholder="Email"
                        class="rounded-lg text-black" required>
                        <input id="password" type="password" placeholder="Enter your password"
                        class="rounded-lg text-black" required>
                        <div class="flex items-center gap-2">
                            <input id="terms" type="checkbox"
                        class="rounded-lg" required> I agree to the Terms & Conditions
                        </div>
                    </div>
                    <input id="submit" type="submit" value="Create account"
                    class="h-fit w-full rounded-lg bg-slate-600 cursor-pointer">
                </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>