<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Laravel log files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $logDirectory = storage_path('logs');
        $logFiles = glob($logDirectory . '/*.log');

        foreach ($logFiles as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        $this->info('Log files cleared successfully.');
    }
}
