<?php

namespace App\View\Components;

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
        $this->ranks = Rank::top(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.recent-ranks');
    }
}
