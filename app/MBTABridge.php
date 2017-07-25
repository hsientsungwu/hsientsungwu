<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class MBTABridge extends Model
{
    public $baseUrl = "http://realtime.mbta.com/developer/api/v2/";
    public $format = "json";

    public $stops = [
        'auburndale' => 'Auburndale',
        'westborough' => 'Westborough',
        'backbay' => 'Back Bay',
        'westnatick' => 'West Natick',
    ];

    public function getScheduleByTrip($trip_id) {
        $trip_name = Trip::getTripName($trip_id);

        if ($trip_name == '') return [];

        return $this->getData('schedulebytrip', ['trip' => $trip_name]);
    }

    public function getScheduleByStop($stop_id) {
        $stop_name = $this->stops[$stop_id];

        if ($stop_name == '') return [];

        return $this->getData('schedulebystop', ['stop' => $stop_name]);
    }

    public function getPredictionByTrip($trip_id) {
        $trip_name = Trip::getTripName($trip_id);

        if ($trip_name == '') return [];

        return $this->getData('predictionsbytrip', ['trip' => $trip_name]);
    }

    public function getPredictionByStop($stop_id) {
        $stop_name = $this->stops[$stop_id];

        if ($stop_name == '') return [];

        return $this->getData('predictionsbystop', ['stop' => $stop_name]);
    }

    private function getData($action, $params = []) {
        $url = self::getUrl($action);

        foreach ($params as $field => $value) {
            $url .= '&' . $field . '=' . $value;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $output = curl_exec($ch);

        Log::info('Get data from MBTA API.');

        curl_close($ch);

        return $output;
    }

    private function getUrl($action) {
        return $this->baseUrl . $action . '?api_key=' . env('MBTA_ACCESS_TOKEN') . '&format=' . $this->format;
    }
}
