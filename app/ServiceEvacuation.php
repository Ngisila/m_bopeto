<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceEvacuation extends Model
{
    //
    protected $table = 'service_evacuations';
    protected $fillable = [
        'label_serv',
        'objectif',
        ' mission',
        'description',
        'adress_id'
    ];

    public function Adresse()
    {
        return $this->belongsTo('App\Adresse', 'adress_id', 'id');
    }
}
