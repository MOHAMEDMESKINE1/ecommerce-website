<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ClearRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'clear routes ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $commands = [
            'optimize',
            'route:cache',
            'route:clear',
        ];

        foreach ($commands as $command) {
            $this->info("Executing command: $command");
            $this->call($command);
        }

        $this->info('All commands executed successfully.');
    }
}
