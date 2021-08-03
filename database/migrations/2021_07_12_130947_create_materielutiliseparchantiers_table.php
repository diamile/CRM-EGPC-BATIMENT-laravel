<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielutiliseparchantiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materielutiliseparchantiers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_travaux')->nullable();
            $table->foreign('id_travaux')->references('id')->on('travauxes')->onDelete('cascade');
            $table->enum('type_materiel',["brique","ciement","fer","peinture","beton","bois"])->defaul('peinture');
            $table->string('quantite');
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
        Schema::dropIfExists('materielutiliseparchantiers');
    }
}
