<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Rank;
use App\Models\Tournament;
use Filament\Forms\Components\Select;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

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
        // Jezik za datume
        Carbon::setLocale('hr');

        // Paginacija
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');

        FilamentNavigation::addItemType('Page', [
            Select::make('page_id')->searchable()->options(function () {
                return Page::pluck('title', 'slug');
            }),
        ]);

        $menu = FilamentNavigation::get('menu');

        //$menu = Menu::withDepth()->having('depth', '=', '1')->get();
        $recent_tournaments = Tournament::recent(3)->get();
        $recent_ranks       = Rank::top(3)->get();

        View::share('menu', $menu);
        View::share('recent_tournaments', $recent_tournaments);
        View::share('recent_ranks', $recent_ranks);
    }
}
