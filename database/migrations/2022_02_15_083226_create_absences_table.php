<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('absence_id');
            $table->integer('annee_id')->unsigned();
            $table->foreign('annee_id')->references('annee_id')->on('annee_scolaires')->onDelete('cascade');
            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade');
            $table->integer('cours_id')->unsigned();
            $table->foreign('cours_id')->references('cours_id')->on('cours')->onDelete('cascade');
            $table->integer('eleve_id')->unsigned();
            $table->foreign('eleve_id')->references('eleve_id')->on('eleves')->onDelete('cascade');
            $table->integer('enseignant_id')->unsigned();
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onDelete('cascade');
            $table->integer('sequence_id')->unsigned();
            $table->foreign('sequence_id')->references('sequence_id')->on('sequences')->onDelete('cascade');
            $table->integer('nb_heure')->default(0);
            $table->boolean('absent')->default(false);
            $table->date('absence_date');
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
        Schema::dropIfExists('absences');
    }
}
