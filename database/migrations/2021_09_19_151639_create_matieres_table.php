<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->increments("matiere_id");
            $table->integer("groupe_matiere_id")->unsigned();
            $table->foreign("groupe_matiere_id")->references("groupe_matiere_id")->on("groupe_matieres")->onDelete("cascade");
            $table->integer("session_id")->unsigned();
            $table->foreign("session_id")->references("session_id")->on("sessions")->onDelete("cascade");
            $table->integer("enseignant_id")->unsigned()->default(0);
            $table->foreign("enseignant_id")->references("enseignant_id")->on("enseignants")->onDelete("cascade");
            $table->string("intitule")->unique();
            $table->boolean("etat")->default(1);
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
        Schema::dropIfExists('matieres');
    }
}
