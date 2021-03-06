<?php

namespace App\Console;

use App\CommuterAlert;
use App\Trip;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {
            Log::info('Scheduled job ran for Alert Type 1');
            $alerts = CommuterAlert::where('alertType', '=', 1)->get();

            foreach ($alerts as $alert) {
                $response = Trip::hasTripArrivedAtStop($alert->alertTripId, $alert->alertStopId);
                $alert->notify($response);
            }
        })->everyMinute()->between("06:30", "07:20");
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
