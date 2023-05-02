<?php

namespace App\Filament\Pages;

use App\Settings\FooterSettings;
use Filament\Forms;
use Filament\Pages\SettingsPage;

class ManageFooter extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = FooterSettings::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\RichEditor::make('general_info')->label('General information')->required()->columnSpan(2),
            Forms\Components\RichEditor::make('working_hours')->label('Working hours')->required()->columnSpan(2),
        ];
    }
}
