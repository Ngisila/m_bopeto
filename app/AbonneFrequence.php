<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbonneFrequence extends Model
{
    protected $table = 'abonne_frequences';
    protected $fillable = [
        'abonne_id',
        'frequen_id'
    ];

    public function abonne()
    {
        return $this->belongsTo('App\Abonne', 'abonne_id', 'id');
    }

    public function frequence()
    {
        return $this->belongsTo('App\Frequence', 'frequen_id', 'id');
    }
}
