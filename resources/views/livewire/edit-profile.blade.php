<div class="w-full">
    <!-- Profile Section -->
    <div class="flex flex-col gap-6">
        <!-- Name Section -->
        <div class="flex flex-row items-center gap-4">
            <h2 class="text-3xl">{{ auth()->user()->name }}</h2>
            <button wire:click="openModal('name')" class="text-blue-500 hover:text-blue-700">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>

        <!-- Email Section -->
        <div class="flex flex-row items-center gap-4">
            <h3 class="text-base">{{ auth()->user()->email }}</h3>
            <button wire:click="openModal('email')" class="text-blue-500 hover:text-blue-700">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>

        <!-- Password Section -->
        <div class="flex flex-row items-center gap-3">
            <h3>Password</h3>
            <button wire:click="openModal('password')" class="text-blue-500 hover:text-blue-700">
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </div>
    </div>

    <!-- Name Modal -->
    @if($showModal && $modalType === 'name')
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" wire:key="name-modal">
            <div class="bg-slate-800 rounded-lg p-6 w-96">
                <h3 class="text-lg font-bold mb-4">Edit Name</h3>
                <input 
                    type="text" 
                    wire:model="name" 
                    class="w-full p-2 border rounded mb-4 focus:ring-2 focus:ring-blue-500 bg-slate-600"
                >
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                
                <div class="flex justify-end gap-2 mt-4">
                    <button 
                        wire:click="closeModal" 
                        class="px-4 py-2 text-white hover:bg-slate-600 rounded"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="updateName" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Email Modal -->
    @if($showModal && $modalType === 'email')
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" wire:key="email-modal">
            <div class="bg-slate-800 rounded-lg p-6 w-96">
                <h3 class="text-lg font-bold mb-4">Edit Email</h3>
                <input 
                    type="email" 
                    wire:model="email" 
                    class="w-full p-2 border rounded mb-4 focus:ring-2 focus:ring-blue-500 bg-slate-600"
                >
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                
                <div class="flex justify-end gap-2 mt-4">
                    <button 
                        wire:click="closeModal" 
                        class="px-4 py-2 text-white hover:bg-slate-600 rounded"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="updateEmail" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Password Modal -->
    @if($showModal && $modalType === 'password')
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4" wire:key="password-modal">
            <div class="bg-slate-800 rounded-lg p-6 w-96">
                <h3 class="text-lg font-bold mb-4">Change Password</h3>
                
                <div class="space-y-4">
                    <div>
                        <input 
                            type="password" 
                            wire:model="current_password" 
                            placeholder="Current Password"
                            class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 bg-slate-600"
                        >
                        @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <input 
                            type="password" 
                            wire:model="password" 
                            placeholder="New Password"
                            class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 bg-slate-600"
                        >
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <input 
                            type="password" 
                            wire:model="password_confirmation" 
                            placeholder="Confirm New Password"
                            class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500 bg-slate-600"
                        >
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-6">
                    <button 
                        wire:click="closeModal" 
                        class="px-4 py-2 text-white hover:bg-slate-600 rounded"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="updatePassword" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>