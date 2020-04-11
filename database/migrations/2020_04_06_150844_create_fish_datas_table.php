<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fish_id')->unsigned();
            $table->string('language', 2);
            $table->string('name');
            $table->string('short_description', 200);
            $table->text('description');
            $table->foreign('fish_id')->references('id')->on('fish');
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
        Schema::dropIfExists('fish_datas');
    }
}
