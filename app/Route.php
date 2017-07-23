<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    protected $table = 'routes';
    public $timestamps = false;

    public function trips()
    {
        return $this->hasMany('App\Trip');
    }
}
