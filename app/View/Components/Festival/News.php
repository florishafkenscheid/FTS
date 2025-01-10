<?php

namespace App\View\Components\Festival;


use App\Models\FestivalNews;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class News extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public FestivalNews $festivalNews)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.festival.news');
    }
}
