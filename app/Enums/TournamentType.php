<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TournamentType: string implements HasLabel, HasColor
{
    case MP = 'MP';
    case Butler = 'IMP';
    case CrossIMP = 'XIMP';
    case Timski = 'Tim';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return match ($this) {
            self::MP => 'info',
            self::Butler => 'danger',
            self::CrossIMP => 'danger',
            self::Timski => 'warning'
        };
    }
}
