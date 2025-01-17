<?php

namespace App\View\Components\Friend;

use App\Models\Festival;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Activity extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public User $friend, public Festival $upcomingFestival)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.friend.activity');
    }
}
