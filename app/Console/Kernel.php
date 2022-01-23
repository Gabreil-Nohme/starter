<?php

namespace App\Console;
use App\Console\Commands\Notify;
use App\Console\Commands\expiretion;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule)
    { // هنا يتم تنفي  كل دقيقة
        // php artisan schedule:run لنفيذ الامر مباشر نستخدم الامر
        $schedule->command('user:expire')->everyMinute();
        $schedule->command('notify:email')->everyMinute();
    }

    protected function commands()
    {

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
