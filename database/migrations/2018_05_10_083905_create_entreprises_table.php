<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('entrepriseId');
            $table->string('raisonSociale');
            $table->string('capital')->default(00,00000);
            $table->text('discription');
            $table->string('adresse');
            $table->string('siteWeb');
            $table->string('logo');
            $table->string('tel')->default(00,00,00,00,00);
            $table->string('email');
            $table->string('fax')->default(00,00,00,00,00);
            $table->boolean('etat')->default(true);
            $table->integer('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->integer('pays_id');
            $table->foreign('pays_id')->references('id')->on('pays');
            $table->integer('type_org_id');
            $table->foreign('type_org_id')->references('id')->on('type_organismes');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('secteur_id');
            $table->foreign('secteur_id')->references('id')->on('secteurs');
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
        Schema::dropIfExists('entreprises');
    }
}
