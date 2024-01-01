<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Member;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $modelLabel = 'plaćanje';
    protected static ?string $pluralModelLabel = 'plaćanja';

    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('payment_date')->required()->default(now())->native(false)->displayFormat('d.m.Y.')->label('Datum'),
                Radio::make('type')->options([
                    'income' => 'Uplata',
                    'expense' => 'Isplata'
                ])->required()->label('Tip'),
                TextInput::make('amount')->numeric()->step(0.01)->prefixIcon('bx-euro')->required()->label('Iznos')->columnSpanFull(),
                Select::make('member_id')->relationship(name: 'member', modifyQueryUsing: fn(Builder $query) => $query->orderBy('surname')->orderBy('name'))->getOptionLabelFromRecordUsing(fn(Member $record) => "{$record->surname} {$record->name}")->searchable(['name', 'surname'])->preload()->requiredWithout('payer_name')->label('Član'),
                TextInput::make('payer_name')->requiredWithout('member_id')->label('Platitelj'),
                Textarea::make('description')->columnSpanFull()->required()->label('Opis plaćanja')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member.fullName')->label('Platitelj'),
                TextColumn::make('amount')->money('EUR')->label('Iznos')->color(function($state){
                    if ($state>=0) return 'success';
                    else return 'danger';
                }),
                TextColumn::make('description')->words(10)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
