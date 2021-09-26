<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTrimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_trimestres', function (Blueprint $table) {
            $table->increments("note_trimestre_id");
            $table->integer("cours_id")->unsigned();
            $table->foreign("cours_id")->references("cours_id")->on("cours")->onDelete("cascade");
            $table->integer("eleve_id")->unsigned();
            $table->foreign("eleve_id")->references("eleve_id")->on("eleves")->onDelete("cascade");
            $table->integer("trimestre_id")->unsigned();
            $table->foreign("trimestre_id")->references("trimestre_id")->on("trimestres")->onDelete("cascade");
            $table->integer("bulletin_trimestre_id")->unsigned();
            $table->foreign("bulletin_trimestre_id")->references("bulletin_trimestre_id")->on("bulletin_trimestres")->onDelete("cascade");
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
        Schema::dropIfExists('note_trimestres');
    }
}
