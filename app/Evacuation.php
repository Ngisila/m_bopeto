<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evacuation extends Model
{
    //
    protected $table = 'evacuations';
    protected $fillable = [
        'confirmation',
        'observation',
        'abonne_id',
        'frequen_id',
        'type_id',
        'agent_id'
    ];

    public function Abonne()
    {
        return $this->belongsTo('App\Abonne', 'abonne_id', 'id');
    }

    public function Frequence()
    {
        return $this->belongsTo('App\Frequence', 'frequen_id', 'id');
    }

    public function Type()
    {
        return $this->belongsTo('App\Type_evacuation', 'type_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Agent', 'agent_id', 'id');
    }
}
