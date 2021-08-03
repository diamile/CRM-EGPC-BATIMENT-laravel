<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    // protected $fillable = [
    //     'prix_unitaire', 'prix_total', 'designation','quantity','resume','type_devis','id_contact','id_projet'
    // ];


    protected $fillable = [
        'resume','type_devis','id_contact','id_projet'
    ];


    public function projet(){
       
        return $this->BelongsTo(Projet::class,'id_projet');
    }



    public function devis(){
        return $this->hasMany('App\Devis_ligne');
    }

    public function scopeGetInfos($data){
        dd($data);
    }
}
