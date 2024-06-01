<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use RyanChandler\FilamentNavigation\Models\Navigation;

class NavigationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Menu',
            'handle' => 'menu',
            'items' => [],
        ]);
    }
}
