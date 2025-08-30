<?php

namespace App\Filament\Resources\Members;

use Filament\Schemas\Schema;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Members\RelationManagers\RanksRelationManager;
use App\Filament\Resources\Members\Pages\ListMembers;
use App\Filament\Resources\Members\Pages\CreateMember;
use App\Filament\Resources\Members\Pages\EditMember;
use App\Filament\Resources\Members\Pages\ViewMember;
use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;
    protected static ?string $modelLabel = 'član';
    protected static ?string $pluralModelLabel = 'članovi';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                TextColumn::make('status')->state(fn(Member $record
                ) => $record->deleted_at == null ? 'Aktivan' : 'Neaktivan')->badge()->color(fn(string $state
                ) => match ($state) {
                    'Aktivan' => 'success',
                    'Neaktivan' => 'danger'
                }),
                TextColumn::make('crobridge')->label('HBS broj'),
            ])
            ->filters([
                //
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
            ->defaultSort('surname');
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
            'index'  => ListMembers::route('/'),
            'create' => CreateMember::route('/create'),
            'edit'   => EditMember::route('/{record}/edit'),
            'view'   => ViewMember::route('/{record}'),
        ];
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->components([
            TextEntry::make('surname'),
            TextEntry::make('name'),
            TextEntry::make('email'),
            TextEntry::make('crobridge')->label('HBS broj'),
        ]);
    }
}
