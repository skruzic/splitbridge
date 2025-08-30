<?php

namespace App\Filament\Resources\Tournaments;

use Filament\Schemas\Schema;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Tournaments\RelationManagers\RanksRelationManager;
use App\Filament\Resources\Tournaments\Pages\ListTournaments;
use App\Filament\Resources\Tournaments\Pages\CreateTournament;
use App\Filament\Resources\Tournaments\Pages\EditTournament;
use App\Filament\Resources\Tournaments\Pages\ViewTournament;
use App\Enums\TournamentType;
use App\Filament\Resources\TournamentResource\Pages;
use App\Filament\Resources\TournamentResource\RelationManagers;
use App\Models\Tournament;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;
    protected static ?string $modelLabel = 'turnir';
    protected static ?string $pluralModelLabel = 'turniri';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-group';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('results')->required()->rows(4)->label('Rezultati turnira u JSON formatu')->columnSpanFull(),
                DatePicker::make('date')->required()->default(now())->native(false)->label('Datum'),
                Select::make('type')->required()->options(TournamentType::class)->label('Obračun'),
                TextInput::make('remote_id')->label('HBS šifra turnira')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date()->sortable()->label('Datum'),
                TextColumn::make('type')->label('Tip turnira')->badge(),
            ])
            ->filters([
                SelectFilter::make('type')->options([
                    'MP' => 'MP',
                    'IMP' => 'IMP',
                    'XIMP' => 'Cross IMPs',
                ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RanksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTournaments::route('/'),
            'create' => CreateTournament::route('/create'),
            'edit' => EditTournament::route('/{record}/edit'),
            'view' => ViewTournament::route('/{record}')
        ];
    }
}
