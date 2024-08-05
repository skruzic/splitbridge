<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Models\Navigation;

class MainMenu extends Component
{
    public Navigation $menu;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menu = Navigation::fromHandle('menu');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-menu');
    }
}
