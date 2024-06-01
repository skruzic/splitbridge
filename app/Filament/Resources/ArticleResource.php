<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

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
                RichEditor::make('summary')->label('Sažetak')->nullable(),
                RichEditor::make('body')->label('Sadržaj')->required(),
                Toggle::make('sticky')->helperText('Zadržava vijest na vrhu početne stranice'),
                Select::make('status')->options([
                    'DRAFT' => 'Draft',
                    'PUBLISHED' => 'Published',
                ])->required()->default('PUBLISHED'),
                //DateTimePicker::make('published_date')->native(false)->format('d.M.y.')->label('Vrijeme objave')->seconds(false)->default(now())->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Naslov'),
                IconColumn::make('sticky')->boolean(),
                IconColumn::make('status')->icon(fn (string $state): string => match ($state) {
                    'DRAFT' => 'heroicon-o-pencil',
                    'PUBLISHED' => 'heroicon-o-check-circle'
                })->color(fn (string $state): string => match ($state) {
                    'DRAFT' => 'warning',
                    'PUBLISHED' => 'success'
                }),
                //TextColumn::make('published_date')->dateTime()->sortable()->label('Vrijeme objave'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('created_at', 'desc');
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
