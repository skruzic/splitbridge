<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class FooterSettings extends Settings
{
    public string $general_info;
    public string $working_hours;

    public static function group(): string
    {
        return 'footer';
    }
}
