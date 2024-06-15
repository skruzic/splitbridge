<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentType: string implements HasLabel
{
    case INCOME = 'income';
    case EXPENSE = 'expense';

    public function getLabel(): string
    {
        return match ($this) {
            self::EXPENSE => 'Isplata',
            self::INCOME => 'Uplata'
        };
    }
}
