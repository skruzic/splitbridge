<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Filament\Resources\MemberResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'active' => Tab::make('Aktivni'),
            'inactive' => Tab::make('Neaktivni')->modifyQueryUsing(fn (Builder $query) => $query->onlyTrashed()),
            'all' => Tab::make('Svi')->modifyQueryUsing(fn (Builder $query) => $query->withTrashed()),
        ];
    }
}
