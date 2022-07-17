<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Rank;
use App\Models\Tournament;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = Menu::withDepth()->having('depth', '=', '1')->get();
        $recent_tournaments = Tournament::recent(3)->get();
        $recent_ranks = Rank::top(3)->get();

        View::share('menu', $menu);
        View::share('recent_tournaments', $recent_tournaments);
        View::share('recent_ranks', $recent_ranks);
    }
}
