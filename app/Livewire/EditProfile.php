<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditProfile extends Component
{
    public $showModal = false;
    public $modalType = '';
    public $name;
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function openModal($type)
    {
        $this->modalType = $type;
        $this->showModal = true;
    }

    public function save()
    {
        switch($this->modalType) {
            case 'name':
                $this->updateName();
                break;
            case 'email':
                $this->updateEmail();
                break;
            case 'password':
                $this->updatePassword();
                break;
        }
    }

    public function updateName()
    {
        $this->validate([
            'name' => 'required|string|max:255'
        ]);

        Auth::user()->update(['name' => $this->name]);
        $this->closeModal();
    }

    public function updateEmail()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())]
        ]);

        Auth::user()->update([
            'email' => $this->email,
            'email_verified_at' => null
        ]);
        $this->closeModal();
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:8'
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->password)
        ]);
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetValidation();
        $this->showModal = false;
        $this->modalType = '';
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}