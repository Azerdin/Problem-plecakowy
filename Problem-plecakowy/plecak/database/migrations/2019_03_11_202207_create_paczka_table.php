<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaczkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paczkas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa', 1000)->nullable(false);
            $table->double('waga')->nullable(false);
            $table->double('wartosc')->nullable(false);
            $table->char('kod_przes', 10)->nullable(false);
            $table->unsignedInteger('nadawca')->nullable(false);
            $table->foreign('nadawca')->references('id')->on('adres');
            $table->unsignedInteger('odbiorca')->nullable(false);
            $table->foreign('odbiorca')->references('id')->on('adres');
            $table->unsignedInteger('woz_kurier')->nullable(false);
            $table->foreign('woz_kurier')->references('id')->on('autos');

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
        Schema::dropIfExists('paczkas');
    }
}
