<?php

namespace App\Filament\Resources\Seasons\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Seasons\SeasonResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSeasons extends ManageRecords
{
    protected static string $resource = SeasonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
