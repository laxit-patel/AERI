<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    const Alias = "TEST";
    const PK = "test_id";
    const Ref = "test_reference";

    public function rates()
    {
        return $this->belongsTo('App\Rates');
    }

    public function inwards()
    {
        return $this->hasMany('App\Inwards');
    }

    public function materials()
    {
        return $this->belongsTo('App\Materials');
    }
}
