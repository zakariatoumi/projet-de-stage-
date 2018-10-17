<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('civ');
            $table->integer('Tel');
            $table->string('poste');
            $table->boolean('etat')->default(1);            
            $table->string('Email',100)->unique();
            $table->string('password');
            $table->string('avatar')->default('default.jpg');
            $table->integer('entreprise_id')->default(0);
            $table->foreign('entreprise_id')->references('entrepriseId')->on('entreprises');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
