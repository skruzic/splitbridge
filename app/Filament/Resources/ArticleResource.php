<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $modelLabel = 'vijest';
    protected static ?string $pluralModelLabel = 'vijesti';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Naslov')->required(),
                MarkdownEditor::make('summary')->label('Sažetak'),
                MarkdownEditor::make('body')->label('Sadržaj')->required(),
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
                TextColumn::make('user.name')->label('Autor'),
                TextColumn::make('published_date')->dateTime('d.m.Y. H:i')->sortable()->label('Vrijeme objave'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
