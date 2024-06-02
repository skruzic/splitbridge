<?php

namespace App\Console\Commands;

use App\Models\Tournament;
use Illuminate\Console\Command;

class ParseTournament extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tournaments:parse {t}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses a single HBS tournament';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $t = Tournament::findOrFail($this->argument('t'));

        if ($t->remote_id > 0) {
            $t->parseHBS();
        } else {
            $this->warn('Turnir ' . $this->argument('t') . ' se ne može obraditi.');
        }
    }
}
