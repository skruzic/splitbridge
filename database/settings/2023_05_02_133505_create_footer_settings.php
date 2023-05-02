<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('footer.general_info', 'Opći podaci');
        $this->migrator->add('footer.working_hours', 'Vrijeme održavajna turnira');
    }
};
