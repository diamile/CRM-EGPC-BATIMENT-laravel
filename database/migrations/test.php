<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Travaux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travaux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type_travaux',['peinture','carrelage','plomberie','fondement']);

            $table->enum('etat',['en_attente','encours','validé']);

            $table->enum('type_chantier',['gros-oeuvre','second-oeuvre']);
            
            $table->string('responsable_chantier')->nullable();

            $table->unsignedBigInteger('id_projet')->nullable();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            
            $table->datetime('date_debut');
            $table->datetime('date_fin');
            $table->timestamps();

            //$table->string('id_decaissement')
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travaux');
    }
}





<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    //
    protected $fillable = [
        'type_travaux', 'etat', 'type_chantier','responsable_chantier','id_projet','date_debut'
    ];

    public function projet(){
        return $this->belongsTo('App\Projet');
    }
}



