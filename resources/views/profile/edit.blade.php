<x-app-layout>

<div class="h-[85vh] w-full">
    <!-- ... existing content ... -->
    <div class="h-1/3 w-full flex flex-row">
        <div class="h-full w-1/2 pl-20 flex items-center">
            <div class="h-40 w-40 border-2 rounded-full">
                <!-- profile picture -->
            </div>
            <div class="flex flex-col m-4 gap-6">
                <div>
                    <div class="flex flex-row items-center gap-4">
                        <h2 class="text-3xl">{{ auth()->user()->name }}</h2>
                        <i class="fa-solid fa-pen-to-square cursor-pointer" onclick="openModal('nameModal')"></i>
                    </div>
                    <div class="flex flex-row items-center gap-4">
                        <h3 class="text-base">{{ auth()->user()->email }}</h3>
                        <i class="fa-solid fa-pen-to-square cursor-pointer" onclick="openModal('emailModal')"></i>
                    </div>
                </div>
                <div class="flex flex-row items-center gap-3">
                    <h3>Password</h3>
                    <i class="fa-solid fa-pen-to-square cursor-pointer" onclick="openModal('passwordModal')"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Name Modal -->
<div id="nameModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="modal-content relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Name</h3>
            <form id="nameForm" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                <div class="mt-2 px-7 py-3">
                    <input type="text" name="name" value="{{ auth()->user()->name }}" 
                           class="w-full px-3 py-2 border rounded-md" required>
                    <div id="nameError" class="text-red-500 text-sm mt-1"></div>
                </div>
                <div class="items-center px-4 py-3">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
                    <button type="button" onclick="closeModal('nameModal')" 
                            class="px-4 py-2 ml-2 bg-gray-500 text-white rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Email Modal -->
<div id="emailModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="modal-content relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Email</h3>
            <form id="emailForm" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                <div class="mt-2 px-7 py-3">
                    <input type="email" name="email" value="{{ auth()->user()->email }}" 
                           class="w-full px-3 py-2 border rounded-md" required>
                    <div id="emailError" class="text-red-500 text-sm mt-1"></div>
                </div>
                <div class="items-center px-4 py-3">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
                    <button type="button" onclick="closeModal('emailModal')" 
                            class="px-4 py-2 ml-2 bg-gray-500 text-white rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Password Modal -->
<div id="passwordModal" class="modal hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="modal-content relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Change Password</h3>
            <form id="passwordForm" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                <div class="mt-2 px-7 py-3">
                    <input type="password" name="current_password" placeholder="Current Password" 
                           class="w-full px-3 py-2 border rounded-md" required>
                    <div id="current_passwordError" class="text-red-500 text-sm mt-1"></div>
                </div>
                <div class="mt-2 px-7 py-3">
                    <input type="password" name="password" placeholder="New Password" 
                           class="w-full px-3 py-2 border rounded-md" required>
                    <div id="passwordError" class="text-red-500 text-sm mt-1"></div>
                </div>
                <div class="mt-2 px-7 py-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm New Password" 
                           class="w-full px-3 py-2 border rounded-md" required>
                    <div id="password_confirmationError" class="text-red-500 text-sm mt-1"></div>
                </div>
                <div class="items-center px-4 py-3">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
                    <button type="button" onclick="closeModal('passwordModal')" 
                            class="px-4 py-2 ml-2 bg-gray-500 text-white rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', () => {
    // Handle name form
    document.getElementById('nameForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, 'name');
    });

    // Handle email form
    document.getElementById('emailForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, 'email');
    });

    // Handle password form
    document.getElementById('passwordForm').addEventListener('submit', function(e) {
        e.preventDefault();
        submitForm(this, 'password');
    });
});

function submitForm(form, formType) {
    // Clear previous errors
    form.querySelectorAll('[id$="Error"]').forEach(element => {
        element.textContent = '';
    });

    const formData = new FormData(form);
    fetch(form.action, {
        method: form.method,
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) return response.json().then(err => { throw err; });
        return response.json();
    })
    .then(data => {
        if (data.user) {
            // Update UI
            switch(formType) {
                case 'name':
                    document.querySelector('.text-3xl').textContent = data.user.name;
                    break;
                case 'email':
                    document.querySelector('.text-base').textContent = data.user.email;
                    break;
            }
            closeModal(`${formType}Modal`);
        }
    })
    .catch(error => {
        if (error.errors) {
            Object.entries(error.errors).forEach(([field, messages]) => {
                const errorField = document.getElementById(`${field}Error`);
                if (errorField) {
                    errorField.textContent = messages[0];
                }
            });
        }
    });
}
</script>

</x-app-layout>