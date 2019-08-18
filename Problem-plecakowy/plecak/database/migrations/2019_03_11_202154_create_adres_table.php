<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ulica', 100)->nullable(false);
            $table->char('nr_budynku', 4)->nullable(false);
            $table->char('nr_lokalu', 4)->nullable(false);
            $table->string('miasto', 100)->nullable(false);
            $table->char('kod_pocztowy', 6)->nullable(false);
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
        Schema::dropIfExists('adres');
    }
}
