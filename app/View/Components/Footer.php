<?php

namespace App\View\Components;

use App\Settings\FooterSettings;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use RyanChandler\FilamentNavigation\Models\Navigation;

class Footer extends Component
{
    public Navigation $menu;
    public FooterSettings $settings;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(FooterSettings $settings)
    {
        $this->menu = FilamentNavigation::get('menu');
        $this->settings = $settings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
