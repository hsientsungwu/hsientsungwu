<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CommuterAlert extends Model
{
    protected $table = 'alerts';
    protected $primaryKey = 'alertId';

    public function notify($response) {
        if ($this->alertEstimatedArrivalTime != $response['time']) {
            self::slack($response['message']);
            $this->alertLastResponse = $response['message'];
            $this->alertEstimatedArrivalTime = $response['time'];
            $this->save();
        }
    }

    public static function slack($message) {
        $data = "payload=" . json_encode(array(
                "text"          =>  $message
            ));

        Log::info('Send Slack message.');

        // You can get your webhook endpoint from your Slack settings
        $ch = curl_init("https://hooks.slack.com/services/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");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
