<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('circulations:update-overdue')->everyMinute();
    }


    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        // Load custom Artisan commands from the Commands folder
        $this->load(__DIR__.'/Commands');

        // Load console routes if needed
        require base_path('routes/console.php');
    }
}
