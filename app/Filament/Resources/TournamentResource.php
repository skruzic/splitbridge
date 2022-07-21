<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TournamentResource\Pages;
use App\Models\Tournament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('results')->required()->disk('public')->directory('upload')->visibility('public'),
                DatePicker::make('date')->required()->default(now()),
                Select::make('type')->required()->options([
                    'MP'   => 'MP',
                    'IMP'  => 'IMP',
                    'XIMP' => 'Cross IMPs',
                    'Tim'  => 'Tim',
                ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date()->sortable(),
                TextColumn::make('type'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options([
                    'MP'   => 'MP',
                    'IMP'  => 'IMP',
                    'XIMP' => 'Cross IMPs',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTournaments::route('/'),
            'create' => Pages\CreateTournament::route('/create'),
            'edit'   => Pages\EditTournament::route('/{record}/edit'),
        ];
    }
}
