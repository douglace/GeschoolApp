<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->increments('emploi_id');
            $table->time('heur_db');
            $table->time('heur_fin');
            $table->integer('annee_id')->unsigned();
            $table->foreign('annee_id')->references('annee_id')->on('annee_scolaires')->onDelete('cascade');
            $table->integer('session_id')->unsigned();
            $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('classe_id')->on('classes')->onDelete('cascade');
            $table->integer('jour_id')->unsigned();
            $table->foreign('jour_id')->references('jour_id')->on('jours')->onDelete('cascade');
            $table->integer('cours_id')->unsigned()->nullable();
            $table->foreign('cours_id')->references('cours_id')->on('cours')->onDelete('cascade');
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
        Schema::dropIfExists('emplois');
    }
}
