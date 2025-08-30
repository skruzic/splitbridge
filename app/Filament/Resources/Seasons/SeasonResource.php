<?php

namespace App\Filament\Resources\Seasons;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Seasons\Pages\ManageSeasons;
use App\Filament\Resources\SeasonResource\Pages;
use App\Models\Season;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class SeasonResource extends Resource
{
    protected static ?string $model = Season::class;
    protected static ?string $modelLabel = 'sezona';
    protected static ?string $pluralModelLabel = 'sezone';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->label('Naslov'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Naslov'),
                ToggleColumn::make('current')->label('Tekuća')->beforeStateUpdated(fn(Season $record
                ) => Season::where('id', '!=', $record->id)->update(['current' => false])),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])->defaultSort('title', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSeasons::route('/'),
        ];
    }
}
