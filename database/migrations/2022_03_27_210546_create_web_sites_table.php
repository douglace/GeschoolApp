<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_sites', function (Blueprint $table) {
            $table->id();
            $table->string('tel');
            $table->string('adresse');
            $table->string('email');
            $table->string('lien_facebook');
            $table->string('lien_instagram');
            $table->string('lien_gmail');
            $table->string('lien_youtube');
            $table->string('logo');
            $table->string('slide1');
            $table->string('slide2');
            $table->string('slide3');
            $table->string('about_image');
            $table->string('about_content');
            $table->string('about_contraction');
            $table->string('about_fondateur');
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
        Schema::dropIfExists('web_sites');
    }
}
