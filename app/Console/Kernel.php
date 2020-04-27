<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
       protected $commands = [
//           \App\Console\Commands\Inspire::class,
       ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //mail('mail@yandex.ru', 'start@ff.com', 'Hello');
        $schedule->call(function () {
            \DB::table('users')->insert([
                ['name' => 'dsfsdfsdf',
                'email' => rand(1,100000),
                'password' => '111']
            ]);
        })->everyFiveMinutes();
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
