<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * Out of the box, all commands are scheduled to run on a single server.
     * To schedule a command on multiple servers, add a call to `Event::onManyServers`
     * e.g. $schedule->command('inspire')->onManyServers()->hourly()
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load([
            __DIR__.'/Commands',
            ...glob(app_path('Domain/*/Commands')),
        ]);

        require base_path('routes/console.php');
    }
}
