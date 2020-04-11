<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLakeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lake_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lake_id')->unsigned();
            $table->string('language', 2);
            $table->string('name');
            $table->string('short_description', 200);
            $table->text('description');
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
        Schema::dropIfExists('lake_datas');
    }
}
