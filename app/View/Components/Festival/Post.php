<?php

namespace App\View\Components\Festival;

use App\Models\Festival;
use App\Models\FestivalNews;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Festival $festival, public FestivalNews $festivalNews)
    {
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.festival.post');
    }
}
