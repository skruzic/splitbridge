<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeasonResource\Pages;
use App\Models\Season;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SeasonResource extends Resource
{
    protected static ?string $model = Season::class;

    protected static ?string $modelLabel = 'sezona';

    protected static ?string $pluralModelLabel = 'sezone';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->label('Naslov'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Naslov'),
                IconColumn::make('current')->boolean()->label('Tekuća'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('CUSTOM')->icon('heroicon-o-check')->label('Postavi za tekuću')->color('success')->requiresConfirmation()->tooltip('Set this season as current')->action(function (
                    Season $record
                ) {
                    $record->current = true;
                    $record->save();
                }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('title', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSeasons::route('/'),
        ];
    }
}
