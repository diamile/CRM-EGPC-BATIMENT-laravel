
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decaissements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact');
            $table->string('adresse',200);
            $table->string('telephone',200);
            $table->string('montant');
            $table->string('prestation',200);
            $table->string('projet');
            $table->string('prestataire');
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
        Schema::dropIfExists('decaissements');
    }
}
