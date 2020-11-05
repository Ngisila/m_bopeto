<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mode_Paiement extends Model
{
    protected $table = 'mode__paiements';
    protected $fillable = [
        'lib_mod_paie'
    ];
}
