<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = 'personnes';
    protected $fillable = [
        "nom",
        "prenom",
        "telephon",
        "adresse_id"
    ];

    public function adresses()
    {
        return $this->belongsTo('App\Adresse', 'adresse_id', 'id');
    }
}
