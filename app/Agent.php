<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';
    protected $fillable = [
        'personn_id',
        'fonct_id',
        'serv_id'
    ];

    public function personnes()
    {
        return $this->belongsTo('App\Personne', 'personn_id', 'id');
    }

    public function fonctions()
    {
        return $this->belongsTo('App\Fonction', 'fonct_id', 'id');
    }

    public function services()
    {
        return $this->belongsTo('App\Service_Evacuation', 'serv_id', 'id');
    }
}
