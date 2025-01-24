<x-app-layout>

<div class="h-[85vh] w-full overflow-hidden">
    <div class="h-1/3 w-full flex flex-row">
        <div class="h-full w-1/2 pl-20 flex items-center">
            <div class="h-40 w-40 border-2 rounded-full">
                <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="" class="h-full w-full rounded-full object-cover">
            </div>
            <div class="flex flex-col m-4 -translate-y-1/2">
                <h2 class="text-3xl">{{$user->name}}</h2>
                <h3 class="text-base">{{ucfirst($user->rank)}}</h3>
            </div>
        </div>
        <div class="h-full w-1/2 pr-20 flex flex-col items-end justify-center gap-4">
            <button class="w-1/5 min-w-24 bg-slate-600 p-2 rounded-md text-start flex flex-row justify-between" onclick="window.location='{{ route('edit_profile') }}'">Edit profile<i class="fa-solid fa-pen self-center"></i></button>
            <button class="w-1/5 min-w-24 bg-green-400 p-2 rounded-md text-start flex flex-row justify-between" onclick="window.location='{{ route('add_friends')}}'">Add friend<i class="fa-solid fa-user-plus self-center"></i></button>
        </div>
    </div>
    <x-h-linebreak/>
    <div class="h-1/2 w-full flex flex-row">
        <div class="h-full w-1/2 flex flex-col  -mt-4">
            <div class="h-fit">
                <h2 class="text-2xl ml-10 w-fit h-fit">Previous Festivals</h2>
                <div class=" flex flex-row gap-2 ml-10 w-fit h-fit items-center"> <!-- todo: functionality (database dependant) -->
                    @if($currentYear > $years->first())
                    <a class="cursor-pointer" 
                    href="{{ request()->fullUrlWithQuery(['year' => $currentYear - 1]) }}">
                    <i class="fa-solid fa-chevron-left"></i></a>
                    @endif
                    <h3 class="text-xl">{{$currentYear}}</h3>
                    @if($currentYear < $years->last())
                    <a class="cursor-pointer"
                    href="{{ request()->fullUrlWithQuery(['year' => $currentYear + 1]) }}"><i class="fa-solid fa-chevron-right"></i></a>
                    @endif
                </div>
            </div>
            <div class="flex-grow w-full overflow-y-scroll overflow-x-hidden no-scrollbar">
                @if($previousFestivals->has($currentYear))
                    @forelse($previousFestivals[$currentYear] as $festival)
                        <x-festival.previous
                        :festival="$festival"
                        />
                    @empty
                    @endforelse
                @endif
            </div>
        </div>
        <div class="h-[125%] w-fit flex self-center mt-1">
            <x-v-linebreak/>
        </div>
        <div class="h-full w-1/2 -mt-4 flex flex-col">
            <div class="flex flex-row justify-between px-8 items-center">
                <h2 class="text-2xl">Friend Activity</h2>
                <h4 class="text-sm">Upcoming</h4>
            </div>
            <div class="flex-grow w-full overflow-y-scroll overflow-x-hidden no-scrollbar">
                @forelse ($friends as $friend)
                    @if($friend->upcomingFestival->isNotEmpty())
                        <x-friend.activity
                            :friend="$friend"
                            :upcomingFestival="$friend->upcomingFestival->first()"/>
                    @endif
                @empty
                    <p class="text-gray-500 text-center mt-4">No friend activity</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

</x-app-layout>