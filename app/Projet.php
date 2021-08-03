<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    protected $fillable = [
        'name', 'ville', 'responsable','phone','statut','adresse'
    ];

    public $timestamps = true;

    public function devis(){
       
        return $this->HasOne('App\Devis');
    }



    public function travaux(){
        return $this->HasOne('App\Travaux');
    }


    public function contrainte(){
        return $this->hasMany('App\Contrainte');
    }
}
