<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $primarykey = 'client_id';
    public $incrementing = false;

    const Alias = "CLNT";
    const PK = "client_id";
    const Ref = "client_reference";
}
