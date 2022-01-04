<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigInteger('registre')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->datetime('date_naissance');
            $table->string('adresse');
            $table->string('pays');
            $table->string('ville');
            $table->integer('code_postal');
            $table->string('gsm');
            $table->string('contact');
            $table->string('contact_gsm');
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
        Schema::dropIfExists('patients');
    }
}
