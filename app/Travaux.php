<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    protected $fillable = [
        'type_travaux', 'etat', 'type_chantier','responsable_chantier','id_projet'
    ];

    public $timestamps = true;

   
    public function projet(){
       
        return $this->BelongsTo(Projet::class,'id_projet');
    }


    public function decaissement(){
        return $this->HasOne('App\Decaissement');
    }
}




