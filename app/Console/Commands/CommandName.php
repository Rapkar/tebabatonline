<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CommandName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'giv:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show app description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $this->info('command done.');
    }
}
