<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequence extends Model
{
    protected $table = 'frequences';
    protected $fillable = ['libelle'];
}
