<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Equipaments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->binary('status');
            $table->unsignedInteger('equipament_type_id');
            $table->foreign('equipament_type_id')->references('id')->on('equipament_types');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
