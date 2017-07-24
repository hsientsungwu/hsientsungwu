<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alerts')->insert([
            'alertId' => 1,
            'alertType' => 1,
            'alertStopId' => 'Wellesley Square',
            'alertTripId' => '584',
            'alertEstimatedArrivalTime' => date('Y-m-d H:i:s', 1500893640)
        ]);

        DB::table('alerts')->insert([
            'alertId' => 2,
            'alertType' => 1,
            'alertStopId' => 'Wellesley Hills',
            'alertTripId' => '584',
            'alertEstimatedArrivalTime' => date('Y-m-d H:i:s', 1500893880)
        ]);

        DB::table('alerts')->insert([
            'alertId' => 3,
            'alertType' => 1,
            'alertStopId' => 'Wellesley Farms',
            'alertTripId' => '584',
            'alertEstimatedArrivalTime' => date('Y-m-d H:i:s', 1500894060)
        ]);

        DB::table('alerts')->insert([
            'alertId' => 4,
            'alertType' => 1,
            'alertStopId' => 'Worcester',
            'alertTripId' => '2514',
            'alertEstimatedArrivalTime' => date('Y-m-d H:i:s', 1500856200)
        ]);
    }

    public function pingUrl($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode>=200 && $httpcode<300){
            return true;
        } else {
            return false;
        }
    }
}
