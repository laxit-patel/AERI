<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $primarykey = 'material_id';
    public $incrementing = false;

    const Alias = "MTRL";
    const PK = "material_id";
    const Ref = "material_reference";
}
