<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TournamentResource\Pages;
use App\Models\Tournament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

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
                //FileUpload::make('results')->required()->label('Datoteka s rezultatima')->disk('uploads')->directory('/upload')->visibility('public'),
                Textarea::make('results')->required()->rows(4)->label('Rezultati turnira u JSON formatu'),
                DatePicker::make('date')->required()->default(now())->displayFormat('d.m.Y')->label('Datum'),
                Select::make('type')->required()->options([
                    'MP' => 'MP',
                    'IMP' => 'IMP',
                    'XIMP' => 'Cross IMPs',
                    'Tim' => 'Tim',
                ])->label('Tip turnira'),
                TextInput::make('remote_id')->label('HBS šifra turnira')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date('d.m.Y.')->sortable()->label('Datum'),
                TextColumn::make('type')->label('Tip turnira'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options([
                    'MP' => 'MP',
                    'IMP' => 'IMP',
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
            'index' => Pages\ListTournaments::route('/'),
            'create' => Pages\CreateTournament::route('/create'),
            'edit' => Pages\EditTournament::route('/{record}/edit'),
        ];
    }
}
