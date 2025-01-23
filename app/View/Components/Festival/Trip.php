<?php

namespace App\View\Components\Festival;

use App\Models\Festival;
use App\Models\Trip as ModelsTrip;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trip extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsTrip $trip, public Festival $festival)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.festival.trip');
    }
}
