<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Devis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('resume');
            $table->enum('type_devis',['devis-client','devis-prestataire','devis-fournisseur','devis-interne']);
            
            
            // $table->unsignedBigInteger('id_projet');
            // $table->foreign('id_projet')->references('id')->on('projets');

            $table->unsignedBigInteger('id_projet')->nullable();
            $table->foreign('id_projet')->references('id')->on('projets')->onDelete('cascade');
            $table->enum('is_valide',['oui','non'])->default('non');


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
        Schema::dropIfExists('devis');
    }
}
