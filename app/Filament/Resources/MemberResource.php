<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $modelLabel = 'član';

    protected static ?string $pluralModelLabel = 'članovi';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Ime')->required(),
                TextInput::make('surname')->label('Prezime')->required(),
                TextInput::make('email')->label('E-mail')->email(),
                TextInput::make('crobridge')->label('HBS broj')->length(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('surname')->label('Prezime')->sortable(),
                TextColumn::make('name')->label('Ime'),
                TextColumn::make('email')->label('E-mail'),
                TextColumn::make('crobridge')->label('HBS broj'),
            ])
            ->filters([
                //
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
            ->defaultSort('surname');
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
            'index'  => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit'   => Pages\EditMember::route('/{record}/edit'),
            'view'   => Pages\ViewMember::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('surname')->label('Prezime'),
            TextEntry::make('name')->label('Ime'),
            TextEntry::make('email')->label('E-mail'),
            TextEntry::make('crobridge')->label('HBS broj'),

            RepeatableEntry::make('ranks')->schema([
                TextEntry::make('tournament.date')->label('Datum')->date('d.m.Y.'),
                TextEntry::make('tournament.type')->label('Tip turnira')->badge(),
                TextEntry::make('rank')->label('Mjesto')->suffix('.'),
                TextEntry::make('points')->numeric(2)->label('Bodovi'),
            ])->columns(4),
        ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
