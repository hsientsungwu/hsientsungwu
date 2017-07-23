<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    public $timestamps = false;

    public static $identifiers = [
        '584' => 'CR-Weekday-Spring-17-584',
        '537' => 'CR-Weekday-Spring-17-537',
        '2502' => 'CR-Sunday-Spring-17-2502',
        '2505' => 'CR-Sunday-Spring-17-2505',
    ];

    public function route() {
        return $this->hasOne('App\Route', 'routeId');
    }

    public function sequences() {
        return $this->hasMany('App\Sequence', 'tripId', 'tripId');
    }

    public static function hasTripArrivedAtStop($trip_id, $stop_name) {
        $trip_name = Trip::getTripName($trip_id);

        $trip = self::where('tripId', '=', $trip_name)->first();

        if (!$trip) {
            echo 'Invalid Trip';
            return;
        }

        $bridge = new MBTABridge();

        $predictionSchedule = $bridge->getPredictionByTrip($trip_id);
        $predictionSchedule = json_decode($predictionSchedule);

        $stop = $trip->sequences->where('sequenceStopId', '=', $stop_name)->first();

        if (!$stop) {
            echo 'Invalid Stop';
            return;
        }

        foreach ($predictionSchedule->stop as $predictionStop) {
            if ($predictionStop->stop_sequence == $stop->sequenceStopSequence) {
                echo "Train will arrive " . $stop->sequenceStopName . " in " . intval(gmdate("i", $predictionStop->pre_away)) . " minute and "
                    . gmdate("s", $predictionStop->pre_away) . " seconds (" . date('H:i A', $predictionStop->pre_dt) . ")";
                break;
            } elseif ($predictionStop->stop_sequence > $stop->sequenceStopSequence) {
                echo "Train has left " . $stop->sequenceStopName;
                break;
            } else {
                continue;
            }

            echo "<br>";
        }
    }

    public static function getTripName($trip) {
        if (array_key_exists($trip, self::$identifiers)) {
            return self::$identifiers[$trip];
        }

        return '';
    }
}
