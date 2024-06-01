<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Models\Payment;
use App\Models\Tournament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getCards(): array
    {
        $fmt = new \NumberFormatter('de_DE', \NumberFormatter::CURRENCY);
        $amount = round(Payment::whereYear('payment_date', 2024)->sum('amount') / 100, 2);
        $lastPayment = Payment::orderBy('payment_date', 'desc')->limit(1)->first();

        return [
            Stat::make('Broj članova', Member::count()),
            Stat::make('Broj turnira', Tournament::count())->description('od listopada 2014. godine')->color('success'),
            Stat::make('Stanje blagajne',
                $fmt->formatCurrency($amount,
                    'EUR'))->description('na dan '.$lastPayment->payment_date->translatedFormat('jS F Y.')),
        ];
    }
}
