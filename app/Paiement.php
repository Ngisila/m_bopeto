<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
    protected $table = 'paiements';
    protected $fillable = [
        'num_paiement',
        'mont_paiemen',
        'mode_id',
        'agent_id',
        'evac_id'
    ];

    public function Mode()
    {
        return $this->belongsTo('App\Mode_Paiement', 'mode_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Agent', 'agent_id', 'id');
    }
    public function Evacuation()
    {
        return $this->belongsTo('App\Evacuation', 'evac_id', 'id');
    }
}
