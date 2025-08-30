<?php

namespace App\Filament\Resources\Tournaments\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Tournaments\TournamentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTournaments extends ListRecords
{
    protected static string $resource = TournamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
