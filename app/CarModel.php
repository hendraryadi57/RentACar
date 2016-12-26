<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'models';

    public function make()
    {
        return $this->belongsTo('App\Make');
    }
}
