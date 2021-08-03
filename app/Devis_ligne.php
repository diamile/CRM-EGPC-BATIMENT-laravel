<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devis_ligne extends Model
{
    public function devisLigne(){
        return $this->belongsTo('App\Devis');
    }

    public $timestamps = true;
}


