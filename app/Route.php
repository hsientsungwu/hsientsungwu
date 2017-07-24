<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $table = 'routes';
    protected $primaryKey = 'routeId';
    public $incrementing = false;
    public $timestamps = false;

    public function trips()
    {
        return $this->hasMany('App\Trip');
    }
}
