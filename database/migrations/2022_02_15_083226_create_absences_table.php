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
            $table->integer('eleve_id')->unsigned()->nullable();
            $table->foreign('eleve_id')->references('eleve_id')->on('eleves')->onDelete('cascade');
            $table->integer('enseignant_id')->unsigned()->nullable();
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onDelete('cascade');
            $table->integer('sequence_id')->unsigned();
            $table->foreign('sequence_id')->references('sequence_id')->on('sequences')->onDelete('cascade');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('classe_id')->on('classes')->onDelete('cascade');
            $table->integer('nb_heure')->default(0);
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
