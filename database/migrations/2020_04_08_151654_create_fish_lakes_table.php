<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishLakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_lakes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fish_id')->unsigned()->default(1);
            $table->foreign('fish_id')->references('id')->on('fish');

            $table->integer('lake_id')->unsigned()->default(1);
            $table->foreign('lake_id')->references('id')->on('lakes');

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
        Schema::dropIfExists('fish_lakes');
    }
}
