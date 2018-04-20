<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\AddWord::class,
        \App\Console\Commands\AddReader::class,
        \App\Console\Commands\AddArticle::class,
        \App\Console\Commands\RemoveReader::class,
        \App\Console\Commands\RemoveWord::class,
        \App\Console\Commands\Ping::class,
        \App\Console\Commands\AddAccessTicker::class,
        \App\Console\Commands\GetStart::class,
        \App\Console\Commands\ArticleMaintenance::class,
        \App\Console\Commands\GetTweet::class,
        \App\Console\Commands\DeleteReader::class,
        \App\Console\Commands\SuggestWord::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('add:article')->cron('*/30 * * * * *');
        $schedule->command('add:access')->cron('30 */1 * * * *');
        $schedule->command('add:tweet')->cron('0 */2 * * * *');
        $schedule->command('article:maintenance')->weekly();
        $schedule->command('ping')->cron('30 5 * * * *');
        $schedule->command('get:start')->cron('30 */11 * * * *');
        $schedule->command('add:suggest')->cron('0 */6 * * * *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
