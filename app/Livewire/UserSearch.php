<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserSearch extends Component
{
    public $search = '';
    public $users = [];

    public function searchUsers() {
        if ($this->search) {
            $this->users = User::where('name', 'like', '%' . $this->search . '%')
                ->where('id', '!=', Auth::user()->id)
                ->get();
        }
    }

    public function addFriend(int $id) {
        $user = Auth::user();

        if (!$user->friends()->where('friend_id', $id)->exists()) {
            $user->friends()->attach($id);
            return Redirect::route('profile');
        } else return Redirect::route('add_friends');
    }

    public function render() {
        return view('livewire.user-search');
    }
}
