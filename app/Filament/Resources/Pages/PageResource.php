<?php

namespace App\Filament\Resources\Pages;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Enums\Status;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;
    protected static ?string $modelLabel = 'stranica';
    protected static ?string $pluralModelLabel = 'stranice';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-book-open';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->live(true)->required()->label('Naslov')->afterStateUpdated(function (
                    Get $get,
                    Set $set,
                    ?string $operation,
                    ?string $old,
                    ?string $state,
                    ?Page $record
                ) {
                    if ($operation == 'edit' && $record->status == Status::Published) {
                        return;
                    }

                    if (($get('slug') ?? '') !== Str::slug($old)) {
                        return;
                    }

                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug')
                         ->required()
                         ->maxLength(255)
                         ->unique(Page::class, 'slug', fn($record) => $record)
                         ->disabled(fn(
                             ?string $operation,
                             ?Page $record
                         ) => $operation == 'edit' && $record->status == Status::Published),
                RichEditor::make('body')->label('Sadržaj'),
                Select::make('status')->options([
                    'DRAFT'     => 'Draft',
                    'PUBLISHED' => 'Published',
                ])->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Naslov'),
                TextColumn::make('user.name')->label('Autor'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
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
            'index'  => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit'   => EditPage::route('/{record}/edit'),
        ];
    }
}
