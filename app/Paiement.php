<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiements';
    protected $fillable = [
        'num_paie',
        'mont_paie',
        'mode_paie_id',
        'agent_id'
    ];

    public function mode_paie()
    {
        return $this->belongsTo('App\Mode_Paiement', 'mode_paie_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent', 'agent_id', 'id');
    }
}
