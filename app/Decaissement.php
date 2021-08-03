<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decaissement extends Model
{
    public function travaux(){
       
        return $this->BelongsTo(Travaux::class,'id_travaux');
    }

    public $timestamps = true;
}
