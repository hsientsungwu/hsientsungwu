<?php

namespace App\Console;

use App\CommuterAlert;
use App\Trip;
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
        /*
        $schedule->call(function () {
            $response = Trip::hasTripArrivedAtStop('584', 'Wellesley Square');

            $alert = CommuterAlert::where('alertId', '=', 1)->first();

            $alert->notify($response);
        })->everyMinute()->between("06:30", "07:10");
*/
        $schedule->call(function () {
            $response = Trip::hasTripArrivedAtStop('2514', 'Framingham');

            $alert = CommuterAlert::where('alertId', '=', 3)->first();
            $alert->notify($response);
        })->everyMinute();

        $schedule->call(function () {
            $data = "payload=" . json_encode(array(
                    "text"          =>  "testing - " . time()
                ));

            // You can get your webhook endpoint from your Slack settings
            $ch = curl_init("https://hooks.slack.com/services/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");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
        })->everyFiveMinutes();
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
