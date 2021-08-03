<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContraintesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraintes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_projet')->nullable();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            $table->enum('type_contrainte',["materiel","eau","transport","maladie","stockage-brique","stockage-ciment","autorisation de construction"])->default('materiel');
            $table->string('titre');
            $table->text('description');
            
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
        Schema::dropIfExists('contraintes');
    }
}
