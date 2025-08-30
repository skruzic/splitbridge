<?php

namespace App\Filament\Resources\Members\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RanksRelationManager extends RelationManager
{
    protected static string $relationship = 'ranks';

    protected static ?string $title = 'Odigrani turniri';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('points')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tournament.date')
            ->columns([
                TextColumn::make('tournament.date')->label('Datum')->date(),
                TextColumn::make('tournament.type')->label('Tip')->badge(),
                TextColumn::make('rank')->label('Rang')->suffix('.'),
                TextColumn::make('points')->label('Poeni')->numeric(2)->alignRight()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
