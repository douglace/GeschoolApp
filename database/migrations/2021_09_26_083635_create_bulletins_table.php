<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->increments("bulletin_id");
            $table->integer("annee_id")->unsigned();
            $table->foreign("annee_id")->references("annee_id")->on("annee_scolaires")->onDelete("cascade");
            $table->integer("classe_id")->unsigned();
            $table->foreign("classe_id")->references("classe_id")->on("classes")->onDelete("cascade");
            $table->integer("eleve_id")->unsigned();
            $table->foreign("eleve_id")->references("eleve_id")->on("eleves")->onDelete("cascade");
            $table->float("moyenne")->default(0);
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
        Schema::dropIfExists('bulletins');
    }
}
