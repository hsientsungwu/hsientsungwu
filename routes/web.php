<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Log;

Route::get('/', function () {
	Log::info('Someone visited homepage - hsientsungwu.com');
    return view('welcome');
});

Route::domain('commuter.' . env('APP_URL'))->group(function () {
    Route::get('/commuter/trip/{trip}/schedule/', 'CommuterController@getScheduleByTrip');
    Route::get('/commuter/trip/{trip}/prediction/', 'CommuterController@getPredictionByTrip');
    Route::get('/commuter/stop/{stop}/schedule/', 'CommuterController@getScheduleByStop');
    Route::get('/commuter/stop/{stop}/prediction/', 'CommuterController@getPredictionByStop');
    Route::get('/commuter/trip/{trip}/save', 'CommuterController@saveTrip');
    Route::get('/commuter/trip/{trip}/notify/{stop}', 'CommuterController@notifyTrip');
});
