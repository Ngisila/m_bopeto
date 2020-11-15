<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    //
    protected $table = 'abonnes';
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adress_id',
        'frequence_id',
        'servi_id',
    ];

    public function Adresse()
    {
        return $this->belongsTo('App\Adresse', 'adress_id', 'id');
    }

    public function Frequence()
    {
        return $this->belongsTo('App\Frequence', 'frequence_id', 'id');
    }

    public function Service()
    {
        return $this->belongsTo('App\Service', 'servi_id', 'id');
    }
}
