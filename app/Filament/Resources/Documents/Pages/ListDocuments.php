<?php

namespace App\Filament\Resources\Documents\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Documents\DocumentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocuments extends ListRecords
{
    protected static string $resource = DocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
