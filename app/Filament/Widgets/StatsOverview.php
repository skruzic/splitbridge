<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Models\Tournament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        return [
            Card::make('Broj članova', Member::count()),
            Card::make('Broj turnira', Tournament::count())->description('od listopada 2014. godine')->color('success'),
        ];
    }
}
