<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum TournamentType: string implements HasLabel, HasColor
{
    case Matchpoints = 'MP';
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
            self::Matchpoints => 'info',
            self::Butler => 'danger',
            self::CrossIMP => 'danger',
            self::Timski => 'warning'
        };
    }
}
