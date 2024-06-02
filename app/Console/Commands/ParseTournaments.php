<?php

namespace App\Console\Commands;

use App\Models\Tournament;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ParseTournaments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournaments:parse-all {type : Tournament type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all HBS tournaments of the specified type';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tournaments = Tournament::where([
            [
                'type',
                $this->argument('type'),
            ],
            [
                'remote_id',
                '>',
                0,
            ],
        ])->pluck('id');

        $this->withProgressBar($tournaments, fn(int $id) => Artisan::call('tournaments:parse', ['t' => $id]));
    }
}
