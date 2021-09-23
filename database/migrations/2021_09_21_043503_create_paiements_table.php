<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->increments("paiement_id");
            $table->integer("eleve_id")->unsigned();
            $table->foreign("eleve_id")->references("eleve_id")->on("eleves")->onDelete("cascade");
            $table->integer("annee_id")->unsigned();
            $table->foreign("annee_id")->references("annee_id")->on("annee_scolaires")->onDelete("cascade");
            $table->integer("montant")->default(0);
            $table->integer("montant_paye")->default(0);
            $table->integer("reste")->default(0);
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
        Schema::dropIfExists('paiements');
    }
}
