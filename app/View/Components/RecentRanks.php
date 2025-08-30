<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Closure;
use App\Models\Rank;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RecentRanks extends Component
{
    public Collection $ranks;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ranks = Rank::top(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.recent-ranks');
    }
}
