<?php

namespace App\Filament\Resources;

use App\Enums\Coefficient;
use App\Enums\TournamentType;
use App\Filament\Resources\TournamentResource\Pages;
use App\Filament\Resources\TournamentResource\RelationManagers;
use App\Models\Tournament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?string $modelLabel = 'turnir';

    protected static ?string $pluralModelLabel = 'turniri';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('results')->required()->rows(4)->label('Rezultati turnira u JSON formatu')->columnSpanFull(),
                DatePicker::make('date')->required()->default(now())->native(false)->label('Datum'),
                Select::make('type')->required()->options(TournamentType::class)->label('Obračun'),
                TextInput::make('remote_id')->label('HBS šifra turnira'),
                Select::make('coefficient')->required()->options(Coefficient::class)->default(Coefficient::Club)->label('Koeficijent turnira')->helperText('Ostaviti prazno za uobičajene klupske turnire'),
                TextInput::make('name')->label('Naziv')->helperText('Ostaviti prazno za uobičajene klupske turnire')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date('d.m.Y.')->sortable()->label('Datum'),
                TextColumn::make('type')->label('Tip turnira')->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options([
                    'MP'   => 'MP',
                    'IMP'  => 'IMP',
                    'XIMP' => 'Cross IMPs',
                ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RanksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTournaments::route('/'),
            'create' => Pages\CreateTournament::route('/create'),
            'edit'   => Pages\EditTournament::route('/{record}/edit'),
            'view'   => Pages\ViewTournament::route('/{record}'),
        ];
    }
}
