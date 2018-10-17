<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSousSecteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_secteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ssecteur');
            $table->text('description');
            $table->integer('secteur_id');
            $table->foreign('secteur_id')->references('id')->on('secteurs');
            $table->boolean('etat')->default(false);
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
        Schema::dropIfExists('sous_secteurs');
    }
}
