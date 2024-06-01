<?php

namespace Database\Seeders;

use App\Models\Rank;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tournament::factory()->count(50)->has(Rank::factory()->count(10))->create();
    }
}
