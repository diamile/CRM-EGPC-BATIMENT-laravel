<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrainte extends Model
{
    public function projet(){
        return $this->belongsTo(Projet::class,'id_projet');
    }
}
