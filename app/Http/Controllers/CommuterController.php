<?php

namespace App\Http\Controllers;

use App;
use App\MBTABridge;
use App\Route;
use App\Sequence;
use App\Trip;
use Illuminate\Http\Request;

class CommuterController extends Controller
{
    /**
     * @param $trip
     */
    public function getScheduleByTrip($trip) {
        $bridge = new MBTABridge();

        echo $bridge->getScheduleByTrip($trip);
    }

    public function getPredictionByTrip($trip) {
        $bridge = new MBTABridge();

        echo $bridge->getPredictionByTrip($trip);
    }

    public function getPredictionByStop($stop) {
        $bridge = new MBTABridge();

        echo $bridge->getPredictionByStop($stop);
    }

    public function notifyTrip($trip_id, $stop = 'Auburndale') {
        Trip::hasTripArrivedAtStop($trip_id, $stop);
    }

    public function saveTrip($trip) {
        $bridge = new MBTABridge();
        $schedule = $bridge->getScheduleByTrip($trip);
        $schedule = json_decode($schedule);

        if (empty($schedule)) return false;

        $route = App\Route::where('routeId', '=', $schedule->route_id)->first();

        if (!$route) {
            $route = new Route();
            $route->routeId = $schedule->route_id;
            $route->routeName = $schedule->route_name;
            $route->save();
        }

        $trip = App\Trip::where('tripId', '=', $schedule->trip_id)->first();

        if (!$trip) {
            $trip = new Trip();
            $trip->tripId = $schedule->trip_id;
            $trip->tripName = $schedule->trip_id;
            $trip->tripDirection = $schedule->direction_id;
            $trip->routeId = $route->routeId;
            $trip->save();

            foreach ($schedule->stop as $stop) {
                $sequence = new Sequence();
                $sequence->sequenceStopSequence = $stop->stop_sequence;
                $sequence->sequenceStopId = $stop->stop_id;
                $sequence->sequenceStopName = $stop->stop_name;
                $sequence->sequenceArrivalTime = date('Y-m-d H:i:s', $stop->sch_arr_dt);
                $sequence->sequenceDeparturetime = date('Y-m-d H:i:s', $stop->sch_dep_dt);
                $sequence->tripId = $trip->tripId;
                $sequence->save();
            }
        }

        if ($route && $trip) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
}
