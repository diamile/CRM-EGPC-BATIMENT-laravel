<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravauxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travauxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type_travaux',['peinture','carrelage','plomberie','fondement']);

            $table->enum('etat',['en_attente','encours','valide']);

            $table->enum('type_chantier',['gros-oeuvre','second-oeuvre']);
            
            $table->string('responsable_chantier')->nullable();

            $table->unsignedBigInteger('id_projet')->nullable();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');

            $table->datetime('date_debut');
            $table->datetime('date_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travauxes');
    }
}
