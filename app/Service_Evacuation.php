<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_Evacuation extends Model
{
    protected $table = 'service__evacuations';
    protected $fillable = [
        'label_serv',
        'objectif',
        'mission',
        'description'
    ];
}
