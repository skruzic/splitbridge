<?php

namespace App\Filament\Resources\Articles;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Articles\Pages\ListArticles;
use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $modelLabel = 'vijest';
    protected static ?string $pluralModelLabel = 'vijesti';

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->label('Naslov')->required(),
                RichEditor::make('summary')->label('Sažetak')->nullable(),
                RichEditor::make('body')->label('Sadržaj')->required(),
                Toggle::make('sticky')->helperText('Zadržava vijest na vrhu početne stranice'),
                Select::make('status')->options([
                    'DRAFT' => 'Draft',
                    'PUBLISHED' => 'Published',
                ])->required(),
                DateTimePicker::make('published_date')->label('Vrijeme objave')->withoutSeconds()->default(now())->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Naslov'),
                IconColumn::make('sticky')->boolean(),
                IconColumn::make('status')->icon(fn(string $state): string => match ($state) {
                    'DRAFT' => 'heroicon-o-pencil',
                    'PUBLISHED' => 'heroicon-o-check-circle'
                })->color(fn(string $state): string => match ($state) {
                    'DRAFT' => 'warning',
                    'PUBLISHED' => 'success'
                }),
                TextColumn::make('published_date')->dateTime('d.m.Y. H:i')->sortable()->label('Vrijeme objave'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])->defaultSort('published_date', 'desc');
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
            'index' => ListArticles::route('/'),
            'create' => CreateArticle::route('/create'),
            'edit' => EditArticle::route('/{record}/edit'),
        ];
    }
}
