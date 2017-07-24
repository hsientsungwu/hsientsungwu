<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $primaryKey = 'tripId';
    public $incrementing = false;
    public $timestamps = false;

    public static $identifiers = [
        '584' => 'CR-Weekday-Spring-17-584',
        '537' => 'CR-Weekday-Spring-17-537',
        '2502' => 'CR-Sunday-Spring-17-2502',
        '2505' => 'CR-Sunday-Spring-17-2505',
        '2512' => 'CR-Sunday-Spring-17-2512',
        '2513' => 'CR-Sunday-Spring-17-2513',
        '2514' => 'CR-Sunday-Spring-17-2514',
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

        $response = ['time' => '', 'message' => ''];

        foreach ($predictionSchedule->stop as $predictionStop) {
            if ($predictionStop->stop_sequence == $stop->sequenceStopSequence) {
                $response['message'] =  "Train (" . $trip_id . ") will arrive at " . $stop->sequenceStopName . " in " . intval(gmdate("i", $predictionStop->pre_away)) . " minute and "
                    . gmdate("s", $predictionStop->pre_away) . " seconds (" . date('H:i A', $predictionStop->pre_dt) . ")";
                $response['time'] = date('H:i A', $predictionStop->pre_dt);
                break;
            } elseif ($predictionStop->stop_sequence > $stop->sequenceStopSequence) {
                $response['message'] =  "Train (" . $trip_id . ") has left " . $stop->sequenceStopName;
                break;
            } else {
                continue;
            }
        }

        return $response;
    }

    public static function getTripName($trip) {
        if (array_key_exists($trip, self::$identifiers)) {
            return self::$identifiers[$trip];
        }

        return '';
    }
}
