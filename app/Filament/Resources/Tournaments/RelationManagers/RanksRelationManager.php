<?php

namespace App\Filament\Resources\Tournaments\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RanksRelationManager extends RelationManager
{
    protected static string $relationship = 'ranks';
    protected static ?string $modelLabel = 'turnir';

    protected static ?string $title = 'Rang lista';

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
            ->recordTitleAttribute('points')
            ->columns([
                TextColumn::make('rank')->suffix('.')->label('Rang'),
                TextColumn::make('member.fullName')->label('Igrač'),
                TextColumn::make('points')->label('Poeni'),
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
