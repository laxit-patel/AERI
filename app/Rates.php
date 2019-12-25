<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $primarykey = 'rate_id';
    public $incrementing = false;

    const Alias = "RATE";
    const PK = "rate_id";
    const Ref = "rate_reference";

    public function test()
    {
        return $this->belongsTo('App\Tests');
    }
}
