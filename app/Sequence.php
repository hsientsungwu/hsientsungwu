<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sequence extends Model
{
    protected $table = 'sequences';
    protected $primaryKey = 'sequenceId';
    public $timestamps = false;

    public function trip() {
        return $this->belongsTo('App\Trip', 'tripId', 'tripId');
    }
}
