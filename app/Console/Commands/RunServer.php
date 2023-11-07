<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $serveProcess = new Process(['php', 'artisan', 'serve']);
        $devProcess = new Process(['npm', 'run', 'dev']);

        $serveProcess->start();
        $this->info('Laravel development server started: http://localhost:8000');

        $devProcess->start();
        $this->info('Vite  development build started...');

        while ($serveProcess->isRunning() || $devProcess->isRunning()) {
            usleep(100000);
        }

        $this->info('All processes completed.');
    }
}
