<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Coefficient: int implements HasLabel
{
    case Club = 1;
    case Tourist = 2;
    case Union = 3;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Club => 'Klupski turnir',
            self::Tourist => 'Turistički turnir',
            self::Union => 'Savezni turnir'
        };
    }
}

