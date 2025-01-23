<div>
    <div class="mt-12 mx-auto h-[8%] w-1/2 bg-slate-800 rounded-lg p-4">
        <input 
            wire:model="search"
            wire:keydown.enter="searchUsers"
            type="text" 
            placeholder="Search users..." 
            class="w-full px-4 py-2 rounded-lg border bg-white text-black focus:outline-none focus:border-blue-500"
        >
    </div>
    
    <div class="mt-4 mx-auto w-1/2">
        @foreach($users as $user)
            <div class="bg-slate-800 p-4 rounded-lg mb-2 flex justify-between items-center">
                <span class="text-white">{{ $user->name }}</span>
                <button 
                    wire:click="addFriend({{ $user->id }})"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                >
                    Add Friend
                </button>
            </div>
        @endforeach
    </div>
</div>