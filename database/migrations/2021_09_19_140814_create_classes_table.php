<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments("classe_id");
            $table->integer("cycle_id")->unsigned();
            $table->foreign("cycle_id")->references("cycle_id")->on("cycles")->onDelete("cascade");
            $table->integer("session_id")->unsigned();
            $table->foreign("session_id")->references("session_id")->on("sessions")->onDelete("cascade");
            $table->integer("enseignant_id")->unsigned()->default(0);
            $table->foreign("enseignant_id")->references("enseignant_id")->on("enseignants")->onDelete("cascade");
            $table->string("intitule")->unique();
            $table->integer("montant");
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
        Schema::dropIfExists('classes');
    }
}
