<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TournamentResource\Pages;
use App\Models\Tournament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('results')->required()->disk('uploads')->directory('/')->visibility('public'),
                DatePicker::make('date')->required()->default(now())->displayFormat('d.m.Y'),
                Select::make('type')->required()->options([
                    'MP' => 'MP',
                    'IMP' => 'IMP',
                    'XIMP' => 'Cross IMPs',
                    'Tim' => 'Tim',
                ]),
                TextInput::make('remote_id')->label('HBS šifra turnira')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')->date('d.m.Y.')->sortable(),
                TextColumn::make('type'),
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
