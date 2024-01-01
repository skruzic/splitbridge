<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all'   => Tab::make('Sve'),
            'income' => Tab::make('Uplate')->modifyQueryUsing(fn(Builder $query) => $query->where('type','=', 'income')),
            'expense'      => Tab::make('Isplate')->modifyQueryUsing(fn(Builder $query) => $query->where('type','=', 'expense')),
        ];
    }
}
