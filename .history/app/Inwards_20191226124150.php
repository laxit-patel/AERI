<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inwards extends Model
{
    const Alias = "INWD";
    const PK = "inward_id";
    const Ref = "inward_reference";

    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
    public function tests()
    {
        return $this->hasMany('App\Tests');
    }
}