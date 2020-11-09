<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    protected $table = 'abonnes';
    protected $fillable = [
        'personn_id'
    ];

    public function Personne()
    {
        return $this->belongsTo('App\Personne', 'personn_id', 'id');
    }
}
