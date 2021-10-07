<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteFinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_fins', function (Blueprint $table) {
            $table->increments("note_fin_id");
            $table->integer("cours_id")->unsigned();
            $table->foreign("cours_id")->references("cours_id")->on("cours")->onDelete("cascade");
            $table->integer("eleve_id")->unsigned();
            $table->foreign("eleve_id")->references("eleve_id")->on("eleves")->onDelete("cascade");
            $table->integer("bulletin_id")->unsigned();
            $table->foreign("bulletin_id")->references("bulletin_id")->on("bulletins")->onDelete("cascade");
            $table->float("note");
            $table->integer("rang")->default(0);
            $table->string("mention")->default("Nul");
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
        Schema::dropIfExists('note_fins');
    }
}
