<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupeMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_matieres', function (Blueprint $table) {
            $table->increments("groupe_matiere_id");
            $table->integer("session_id")->unsigned();
            $table->foreign("session_id")->references("session_id")->on("sessions")->onDelete("cascade");
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
        Schema::dropIfExists('groupe_matieres');
    }
}
