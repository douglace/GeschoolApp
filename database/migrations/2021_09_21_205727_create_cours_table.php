<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments("cours_id");
            $table->integer("matiere_id")->unsigned();
            $table->foreign("matiere_id")->references("matiere_id")->on("matieres")->onDelete("cascade");
            $table->integer("classe_id")->unsigned();
            $table->foreign("classe_id")->references("classe_id")->on("classes")->onDelete("cascade");
            $table->integer("enseignant_id")->unsigned();
            $table->foreign("enseignant_id")->references("enseignant_id")->on("enseignants")->onDelete("cascade");
            $table->integer("annee_id")->unsigned();
            $table->foreign("annee_id")->references("annee_id")->on("annee_scolaires")->onDelete("cascade");
            $table->integer("session_id")->unsigned();
            $table->foreign("session_id")->references("session_id")->on("sessions")->onDelete("cascade");
            $table->integer("coeficient")->default(1);
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
        Schema::dropIfExists('cours');
    }
}
