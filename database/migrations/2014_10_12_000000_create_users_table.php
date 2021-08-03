<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
    |---------------------------------------------------
    | Création de ma table users et creation des champs
    |---------------------------------------------------
   */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->boolean('is_admin')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('phone')->length(10)->unsigned();
            $table->string('adresse',200);
            $table->string('postale',5);
            $table->string('ville',20);
            $table->text('commentaires',200);
           
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     /*
    |-----------------------------------------------------
    | Fonction qui sera appelée quand on fait un roolback
    |-----------------------------------------------------
   */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

