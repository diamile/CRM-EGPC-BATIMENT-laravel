<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DevisLignes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_lignes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('designation');
            $table->text('quantity');
            $table->integer('prix_total');
            $table->integer('prix_unitaire');
           
            
            
            // $table->unsignedBigInteger('id_projet');
            // $table->foreign('id_projet')->references('id')->on('projets');

            $table->unsignedBigInteger('id_devis')->nullable();
            $table->foreign('id_devis')->references('id')->on('devis')->onDelete('cascade');


            // $table->unsignedBigInteger('id_contact');
            // $table->foreign('id_contact')->references('id')->on('contacts');

           
            $table->rememberToken();
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
        //
    }
}
