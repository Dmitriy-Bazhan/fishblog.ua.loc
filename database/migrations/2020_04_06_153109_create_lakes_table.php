<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lakes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->boolean('enabled')->default(true);
            $table->integer('location_id');
            $table->integer('views')->default(0);
            $table->string('photo')->default('none');
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
        Schema::dropIfExists('lakes');
    }
}
