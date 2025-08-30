<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\RichEditor;
use App\Settings\FooterSettings;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class ManageFooter extends SettingsPage
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected static string | \UnitEnum | null $navigationGroup = 'Postavke';

    protected static ?string $navigationLabel = 'Uređivanje postavki';

    protected static string $settings = FooterSettings::class;

    protected function getFormSchema(): array
    {
        return [
            RichEditor::make('general_info')->label('General information')->required()->columnSpan(2),
            RichEditor::make('working_hours')->label('Working hours')->required()->columnSpan(2),
        ];
    }
}
