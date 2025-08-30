<?php

namespace App\Filament\Resources\Members\Pages;

use Filament\Actions\CreateAction;
use Filament\Schemas\Components\Tabs\Tab;
use App\Filament\Resources\Members\MemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'active'   => Tab::make('Aktivni'),
            'inactive' => Tab::make('Neaktivni')->modifyQueryUsing(fn(Builder $query) => $query->onlyTrashed()),
            'all'      => Tab::make('Svi')->modifyQueryUsing(fn(Builder $query) => $query->withTrashed()),
        ];
    }
}
