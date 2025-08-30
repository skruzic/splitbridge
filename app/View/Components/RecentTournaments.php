<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Closure;
use App\Models\Tournament;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RecentTournaments extends Component
{
    public Collection $tournaments;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tournaments = Tournament::recent(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.recent-tournaments');
    }
}
