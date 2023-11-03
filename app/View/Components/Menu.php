<?php

namespace App\View\Components;

use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Models\Navigation;

class Menu extends Component
{
    public Navigation $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = Navigation::fromHandle('menu');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
