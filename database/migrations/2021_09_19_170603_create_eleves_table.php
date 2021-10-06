<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->increments("eleve_id");
            $table->integer("parent_id")->unsigned();
            $table->foreign("parent_id")->references("parent_id")->on("parents")->onDelete("cascade");
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
            $table->string("statut");
            $table->string("maladie");
            $table->string("handicap");
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
        Schema::dropIfExists('eleves');
    }
}
