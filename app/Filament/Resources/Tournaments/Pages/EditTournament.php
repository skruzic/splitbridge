<?php

namespace App\Filament\Resources\Tournaments\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Tournaments\TournamentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTournament extends EditRecord
{
    protected static string $resource = TournamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
