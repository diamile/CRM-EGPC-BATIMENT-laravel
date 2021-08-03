<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('intitule');
            $table->string('entreprise');
            $table->string('client');
            $table->text('clause');
            $table->datetime('date');
            $table->datetime('date_debut_travaux');
            $table->datetime('date_fin_travaux');
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
        Schema::dropIfExists('contrats');
    }
}
