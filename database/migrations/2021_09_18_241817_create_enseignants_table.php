<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments("enseignant_id");
            $table->integer("session_id")->unsigned();
            $table->foreign("session_id")->references("session_id")->on("sessions")->onDelete("cascade");
            $table->string("matricul")->unique();
            $table->string("nom");
            $table->string("prenom");
            $table->string("date");
            $table->string("lieu");
            $table->string("sexe");
            $table->string("nationalite");
            $table->string("adresse");
            $table->string("tel")->unique();
            $table->string("email")->unique();
            $table->string("diplome");
            $table->boolean("etat")->default(1);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('enseignants');
    }
}
