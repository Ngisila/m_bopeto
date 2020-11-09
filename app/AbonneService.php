<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbonneService extends Model
{
    protected $table =  'abonne_services';
    protected $fillable = [
        'abonne_id',
        'servic_id'
    ];

    public function Abonne()
    {
        return $this->belongsTo('App\Abonne', 'abonne_id', 'id');
    }

    public function ServiceEv()
    {
        return $this->belongsTo('App\Service_Evacuation', 'servic_id', 'id');
    }
}
