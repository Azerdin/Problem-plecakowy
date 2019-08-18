<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKurierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imie', 100)->nullable(false);
            $table->string('nazwisko', 100)->nullable(false);
            $table->char('nr_tel', 10)->nullable(false);
            $table->unsignedInteger('auto_id')->nullable(false);
            $table->foreign('auto_id')->references('id')->on('autos');
            $table->unsignedInteger('adres_zamieszkania')->nullable(false);
            $table->foreign('adres_zamieszkania')->references('id')->on('adres');
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
        Schema::dropIfExists('kuriers');
    }
}
