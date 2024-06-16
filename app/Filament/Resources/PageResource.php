<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
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

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                Select::make('status')->options(Status::class)->required(),
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
