<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('materiel');
            $table->string('quantite');
            $table->string('fournisseur');
            $table->string('unite')->nullable();
            $table->string('reception_materiel');
            $table->string('livreur');
            $table->unsignedBigInteger('id_projet')->nullable();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
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
        Schema::dropIfExists('materiels');
    }
}
