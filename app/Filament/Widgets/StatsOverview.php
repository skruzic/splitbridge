<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Member;
use App\Models\Tournament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected ?string $pollingInterval = null;

    protected function getCards(): array
    {
        return [
            Stat::make('Broj članova', Member::count()),
            Stat::make('Broj turnira', Tournament::count())->description('od listopada 2014. godine')->color('success'),
        ];
    }
}
