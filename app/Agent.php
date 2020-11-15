<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
    protected $table = 'agents';
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'fonct_id',
        'servi_id'
    ];

    public function Fonction()
    {
        return $this->belongsTo('App\Fonction', 'fonct_id', 'id');
    }

    public function Service()
    {
        return $this->belongsTo('App\ServiceEvacuation', 'servi_id', 'id');
    }
}
