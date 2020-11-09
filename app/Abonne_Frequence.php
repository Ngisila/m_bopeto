<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne_Frequence extends Model
{
    protected $table = 'abonne_frequence';
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
