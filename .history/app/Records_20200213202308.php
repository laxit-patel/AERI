<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    const Alias = "RCRD";
    const PK = "record_id";
    const Ref = "record_inward";

    public function clients()
    {
        return $this->belongsTo('App\Inwards');
    }

}
